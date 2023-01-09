<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Project;
use App\Model\Category;
use App\User;
use Carbon\Carbon;
use App\Model\File;
use App\Events\SendClientMessage;
use App\Model\MailSetting;
use App\Model\ProjectCategory;
use App\Notifications\SendMail;
use Illuminate\Support\Facades\Mail;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project, Request $request)
    {
        try {
            $projects = $project->allData($request);
            return view('admin.project.index', compact('projects'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $users = User::all();
        return view('admin.project.create', compact('categories', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Project $project, Request $request)
    {
        $request->validate([
            'project.name' => 'required|unique:projects,name',
            'project.description' => 'string|nullable',
            'project.objective' => 'string|nullable',
            'project.budget' => 'string|nullable',
            'project.start_date' => 'required|date',
            'project.end_date' => 'required|date',
            'project.status' => 'nullable|numeric',
            'project.progress' => 'nullable|numeric',
            'project.employee_size' => 'nullable|numeric',
            'categories' => 'required',
        ]);

        $data = [
            'project' => $request->project,
            'categories' => $request->categories,
        ];
        $data['project']['created_by'] = auth()->user()->id;
        try {
            $project->create($data);
            return redirect()->route('projects.index')->with(
                'notification',
                [
                    'class' => 'success',
                    'message' => 'Project Created Successfully.'
                ]
            );
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        try {
            $project = $project->view($project->id);
            $categories = Category::all();
            return view('admin.project.edit', compact('project', 'categories'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        // dd($request);
        $request->validate([
            'project.name' => 'required|unique:projects,name,' . $project->id,
            'project.description' => 'string|nullable',
            'project.objective' => 'string|nullable',
            'project.budget' => 'string|nullable',
            'project.start_date' => 'required|date',
            'project.end_date' => 'required|date',
            'project.status' => 'nullable|numeric',
            'project.progress' => 'nullable|numeric',
            'project.employee_size' => 'nullable|numeric',
            'categories' => 'required',
        ]);

        $projectData = $request->project;
        if (isset($request->project['status']) && $request->project['status'] == 2) {
            $projectData['pause_at'] = date("Y-m-d H:i:s");
        }

        if (isset($request->project['status']) && $request->project['status'] == 1) {
            $total_paused_time = Carbon::now()->diff($project->pause_at)->format('%Y-%m-%d %H:%I:%S');
            $newDate = strtotime($project->end_date) + strtotime($total_paused_time) - strtotime('00-0-0 00:00:00');
            $projectData['end_date'] = date("Y-m-d H:i:s", $newDate);
        }


        $data = [
            'project' => $projectData,
            'categories' => $request->categories,
        ];

        try {
            $project->edit($project->id, $data);
            $this->sendMailToClient($project);
            return redirect()->route('projects.index')->with(
                'notification',
                [
                    'class' => 'success',
                    'message' => 'Project Updated Successfully.'
                ]
            );
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function sendMailToClient($data)
    {
        // $json = json_encode($data);

        $findUser = User::find($data->created_by);
        Mail::to($findUser->email)->send(new SendMail(
            "Hello $findUser->fullName,",
            "Project Updated",
            "We have created an update for your project named $data->name." . "<br/><br/>" .

                "Please login here for more information: <br/>" .
                "https://www.kavax.co.uk/<br/><br/>" .

                "Best Regards,<br/>",

            "Kavax Media"
        ));

        return response()->json(['status' => 'success', 'message' => 'Mail Sent Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project, Request $request)
    {
        try {
            foreach ($request->delete_item as $key => $val) {
                $project->find($val)->delete();
            }
            return redirect()->route('projects.index')->with(
                'notification',
                [
                    'class' => 'success',
                    'message' => 'Project Deleted.'
                ]
            );
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function message($id, Project $project)
    {
        try {
            $project = $project->find($id);
            $messages = $project->messages ?? [];
            return view('admin.project.mesages', compact('project', 'messages'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function messageSend(Request $request, Project $project)
    {
        $request->validate([
            'project_id' => 'required|numeric',
            'message' => 'nullable',
            'files' => 'nullable',
            'files.*' => 'mimes:doc,pdf,docx,zip,jpg,jpeg,png'
        ]);

        $data = [
            'message' => $request->message,
            'project_id' => $request->project_id,
            'user_id' => auth()->user()->id,
        ];

        try {
            if ($request->hasfile('files')) {

                foreach ($request->file('files') as $file) {
                    $msg = $project->addFile($data);
                    $name = time() . '.' . $file->extension();
                    $extension = $file->extension();
                    $file->move(storage_path('app/message/files/'), $name);
                    $filex = new File();
                    $pro = Project::find($request->project_id);
                    $filex->file_name = $name;
                    $filex->user_id = $pro->created_by;
                    $filex->project_id = $pro->id;
                    $filex->file_type = $extension;
                    $filex->msg_id = $msg->msg_id;
                    $filex->save();
                    event(new SendClientMessage([
                        'project_id' => $data['project_id'],
                        'file' =>  array('file_name' => $name),
                        'message' => null,
                        'replied_by' => auth()->user(),
                        'created_at' => $msg->created_at,
                        'msg_id' => $msg->id,
                    ]));
                }
            } else {
                if ($request->message) {
                    $msg = $project->addMessage($data);
                    event(new SendClientMessage([
                        'project_id' => $data['project_id'],
                        'message' => $data['message'],
                        'file' => null,
                        'replied_by' => auth()->user(),
                        'created_at' => $msg->created_at,
                        'msg_id' => $msg->id,
                    ]));
                }
            }

            return back()->with(
                'notification',
                [
                    'class' => 'success',
                    'message' => 'Message sent.'
                ]
            );
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function newProject()
    {

        $category_data = Category::all();
        $user_data = User::all();
        // dd($user_data);


        return view('admin.project.newProject', compact('category_data', 'user_data'));
    }

    public function createProject(Request $request)
    {
        // dd($request);
        $mytime = Carbon::now();
        $time = $mytime->toDateTimeString();
        $insert_into_pro = new Project();
        $insert_into_pro->name = $request->name;
        $insert_into_pro->business_name = $request->business_name;
        $insert_into_pro->objective = $request->objective;
        $insert_into_pro->budget = $request->budget;
        $insert_into_pro->start_date = $time;
        $insert_into_pro->employee_size = $request->employee_size;
        $insert_into_pro->created_by = $request->created_by;
        $insert_into_pro->save();
        foreach ($request->project_category as $cat) {

            $insert_into_cat = new ProjectCategory();
            $insert_into_cat->project_id = $insert_into_pro->id;
            $insert_into_cat->category_id = $cat;
            $insert_into_cat->save();
        }
        $categoryData = [];
        foreach ($request->project_category as $procat) {
            $findCat = Category::find($procat);
            $categoryData[] = $findCat->name;
        }
        $this->sendMailToTeam($insert_into_pro, $categoryData);
        return redirect()->back();
    }

    public function sendMailToTeam($data, $category)
    {

        $findUser = User::find($data->created_by);
        $serviceName = implode(', ', $category);
        // dd($serviceName);
        $mail = MailSetting::pluck('mail_to');
        // dd($mail);
        foreach ($mail as $m) {
            Mail::to($m)->send(new SendMail(
                "Hello team",
                "Glad to inform you that $findUser->fullName has chosen our" . $serviceName . "service",
                "For $data->name",
                "Login here for more information:",
                "https://www.kavax.co.uk/",
                "Best Regards,",
                "Kavax Family"
            ));
        }

        return response()->json(['status' => 'success', 'message' => 'Mail Sent Successfully']);
    }



    public function mailSetting(Request $request, MailSetting $mail)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        try {
            $mail->assignMail($request->email);
            return response()->json(['status' => 'success', 'message' => 'Mail Setting Updated Successfully']);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function filterUser(Request $request, $role)
    {

        if ($role == "customer") {
            $userData = User::where('role', '=', 'customer')->orderBy('id', 'desc')->paginate(20);
            $userData->sortByDesc("id");
        } elseif ($role == "admin") {
            $userData = User::where('role', '=', 'admin')->orWhere('role', '=', 'super_admin')->orderBy('id', 'desc')->paginate(20);
            $userData->sortByDesc("id");
        }
        return view('admin.users.index', compact('userData'));
    }
}
