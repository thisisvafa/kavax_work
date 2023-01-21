<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Model\ServiceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;
use App\Notifications\SendMail;
use Illuminate\Support\Facades\Mail;
use App\Model\Category;
use App\Model\Project;

class ServiceRequestController extends Controller
{
    /* Request Form Page */
    public function show($id, $package)
    {
        $services = Category::orderBy('created_at', 'asc')->get();
        return view('site.pages.services.request', compact('services', 'id', 'package'));
    }

    public function showWOParams()
    {
        $services = Category::orderBy('created_at', 'asc')->get();
        $id = 0;
        $package = 'new';
        return view('site.pages.services.request', compact('services', 'id', 'package'));
    }

    /* Submit Request */
    public function store(Request $request, Project $project)
    {
        $ServiceRequestData = $request->all();

        $ServiceRequestData['request_meta'] = json_encode($request->request_meta);
        $ServiceRequestData['status'] = 'new';

        if (ServiceRequest::create($ServiceRequestData)) {
            //create new user
            $password = rand(100000, 999999);
            $token = Str::random(32);
            $data = [
                'fullName' => $request->full_name,
                'username' => $request->email,
                'email' => $request->email,
                'contactNumber' => $request->phone,
                'businessName' => $request->project_name,
                'role' => 'customer',
                'password' => bcrypt($password),
            ];
            $userFind = User::where('email', $request->email)->first();
            if($userFind == null) {
                $user = User::create($data);
                $userId = $user->id;
            } else {
                $userId = $userFind->id;
            }
            $pdata = [
                'project' => [
                    'name' => $request->project_name,
                    'business_name' => $request->request_meta['name_of_your_business'],
                    'objective' => $request->request_meta['goal_for_the_project'],
                    'budget' => $request->request_meta['budget'] ?? 0,
                    'employee_size' => $request->request_meta['employees'] ?? 0,
                    'created_by' => $userId,
                    'status' => 0,
//                    'package_name' => $request->package_name,
                ],
                'categories' => $request->request_meta['service_type'],
            ];
            $project->create($pdata);
            try {
                Mail::to($request->email)->send(new SendMail(
                    $request->full_name,
                    "Registration Complete",
                    "Hi, Thank you for registration. Your new default password: " . $password . " You can change it after login."
                ));
                return redirect()->back()->with('notification', [
                    'class' => 'success',
                    'message' => 'Your Request has been successfully registered and we will contact you shortly.'
                ]);
            } catch (\Exception $e) {
                return redirect()->back()->with('notification', [
                    'class' => 'success',
                    'message' => 'Your Request has been successfully registered and we will contact you shortly.'
                ]);
            }
        }
    }

    /* Show All Request */
    public function index()
    {
        $ServiceRequest = ServiceRequest::orderBy('created_at', 'desc')->paginate(12)->onEachSide(2);
        return view('admin.service-request.index', compact('ServiceRequest'));
    }

    /* Show Request */
    public function edit($id)
    {
        $ServiceRequest = ServiceRequest::find($id);
        return view('admin.service-request.edit', compact('ServiceRequest'));
    }
}
