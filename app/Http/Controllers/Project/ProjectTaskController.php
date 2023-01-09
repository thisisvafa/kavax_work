<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ProjectTask;
use App\Model\Project;
use App\Notifications\SendMail;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class ProjectTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProjectTask $task, $id)
    {
        try {
            $tasks = $task->allData($id);
            return view('admin.task.index', compact('tasks', 'id'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $users = User::all();
        $projects = Project::all();
        $categories = Project::find($id)->categories;
        return view('admin.task.create', compact('projects', 'id', 'users', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectTask $task, Request $request)
    {
        $request->validate([
            'project_id' => 'required',
            'name' => 'required',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'numeric',
            'priority' => 'numeric',
            'assigned_to' => 'numeric',
            'category' => 'required',
        ]);
        $data = $request->all();
        $data['assigned_by'] = auth()->user()->id;

        try {
            $task = $task->create($data);
            $this->sendMailForTask($request);
            return redirect()->route('tasks.index', $request->project_id)->with(
                'notification',
                [
                    'class' => 'success',
                    'message' => 'Task Created Successfully.'
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
    public function edit(ProjectTask $task)
    {
        try {
            $task = $task->view($task->id);
            $users = User::where('role', '!=', 'customer')->get();
            $projects = Project::all();
            return view('admin.task.edit', compact('task', 'users', 'projects'));
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
    public function update(Request $request, ProjectTask $task)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'numeric',
            'priority' => 'numeric',
            'assigned_to' => 'numeric',
        ]);
        $data = $request->all();


        if (isset($request->status) && $request->status == 2) {
            $data['pause_at'] = date("Y-m-d H:i:s");
        }

        if (isset($request->status) && $request->status == 1) {
            if ($task->project->end_date < $request->end_date) {
                $task->project()->update(['end_date' => $request->end_date]);
            } elseif ($task->pause_at != null) {
                $total_paused_time = Carbon::now()->diff($task->pause_at)->format('%Y-%m-%d %H:%I:%S');
                $newDate = strtotime($task->project->end_date) + strtotime($total_paused_time) - strtotime('00-0-0 00:00:00');
                $task->project()->update(['end_date' => date("Y-m-d H:i:s", $newDate)]);
            }
            $data['pause_at'] = null;
        }


        try {
            $task->edit($task->id, $data);
            // $this->sendMailForTask($task);
            $this->sendMailToClient($task);
            return redirect()->route('tasks.index', $task->project_id)->with(
                'notification',
                [
                    'class' => 'success',
                    'message' => 'Task Updated Successfully.'
                ]
            );
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function sendMailToClient($data)
    {

        $findProject = Project::find($data->project_id);
        $findUser = User::find($findProject->created_by);
        Mail::to($findUser->email)->send(new SendMail(
            " $findUser->fullName",
            "Project Task Updated",
            "We have created an update on Task named $data->name for your project named $findProject->name. <br/><br/>" .

                "Please login here for more information:<br/>",
            "https://www.kavax.co.uk/<br/><br/>",

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
    public function destroy(ProjectTask $task, Request $request)
    {
        try {
            foreach ($request->delete_item as $key => $val) {
                $task->find($val)->delete();
            }
            return redirect()->route('tasks.index', $task->project_id)->with(
                'notification',
                [
                    'class' => 'success',
                    'message' => 'Task Deleted.'
                ]
            );
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function sendMailForTask($data)
    {
        $findEmail = User::find($data->assigned_to);
        $findId = Project::find($data->project_id);
        $findCLient = User::find($findId->created_by);
        Mail::to($findEmail->email)->send(new SendMail(
            " $findEmail->fullName",
            "New Task Assigned",
            "You have been assigned to the following task from $findCLient->fullName" .
                " $data->name for $findId->name.<br/><br/>",
            "Please Login here for more information: <br/>",
            "https://www.kavax.co.uk/ <br/><br/>",
            "Best Regards,<br/>",
            "Kavax Family"
        ));
        return response()->json(['status' => 'success', 'message' => 'Mail Sent Successfully']);
    }
}
