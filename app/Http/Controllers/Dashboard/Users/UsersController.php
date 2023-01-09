<?php

namespace App\Http\Controllers\Dashboard\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\UsersRequest;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:isAdmin');
    }

    public function index(Request $request)
    {
        $userData = User::query();
        if ($request->search != '') {
            $userData = $userData->where('fullName', "LIKE", "%" . $request->search . "%")
                ->orWhere('username', "LIKE", "%" . $request->search . "%")
                ->orWhere('email', "LIKE", "%" . $request->search . "%")
                ->orWhere('contactNumber', "LIKE", "%" . $request->search . "%")
                ->orWhere('businessName', "LIKE", "%" . $request->search . "%")
                ->orWhere('role', "LIKE", "%" . $request->search . "%");
        }
        $userData = $userData->orderBy('id', 'desc')->paginate(20);
        $userData->sortByDesc("id");
        return view('admin.users.index', compact('userData'));
    }

    // public function filterUser(Request $request, $role){
    //     dd($role);

    //     $userData = User::orderBy('id', 'desc')->paginate(20);
    //     $userData->sortByDesc("id");
    //     return view('admin.users.index', compact('userData'));
    // }


    public function create()
    {
        return view('admin.users.create');
    }

    public function store(UsersRequest $userRequest)
    {
        
        $userRequest->validate([
            //            'first_name' => 'required',
            //            'last_name' => 'required',
            'email' => 'required | email | unique:users',
            //            'phone' => 'required|unique',
            //            'address' => 'required',
            //            'postcode' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);
        $data = $userRequest->role;

        $userData = new User;
        $userData->fullName = $userRequest->name;
        $userData->email = $userRequest->email;
        //        $userData->phone = $userRequest->phone;
        $userData->password = bcrypt($userRequest->password);
        if ($userRequest->role == 'super_admin') {
            $userData->role = 'super_admin';
        } else {
            $userData->role = $userRequest->role;
        }
        $userData->save();
        if($data == 'customer'){
            return redirect('/admin/users/customer/customer')->with('notification', [
                'class' => 'success',
                'message' => 'User created'
            ]);
        }else{
            return redirect('/admin/users/admins/admin')->with('notification', [
                'class' => 'success',
                'message' => 'User created'
            ]);
        }
    }

    public function edit($id)
    {
        if ($id == auth()->user()->id || Gate::allows('isAdmin')) {
            $user = User::find($id);
            return view('admin.users.edit', compact('user'))->withInfo('User edited');
        } else {
            return redirect('/admin/no-permissions');
        }
    }

    public function update(Request $request, $id)
    {
        if ($id == auth()->user()->id || Gate::allows('isAdmin')) {

            $userData = User::find($id);

            $this->validate($request, [
                //                'first_name' => 'required',
                //                'last_name' => 'required',
                'email' => 'required|email|unique:users,email,' . $userData->id,
                //                'address' => 'required',
                //                'postcode' => 'required',
                //                'phone' => 'required|unique:users,phone,' . $userData->id,
                'role' => 'required',
            ], [], [
                //                'first_name' => 'First Name',
                //                'last_name' => 'Last Name',
                //                'address' => 'Address',
                //                'postcode' => 'Post Code',
                //                'phone' => 'Phone',
                'email' => 'Email',
                'password' => 'Password',
                'role' => 'Role',
            ]);


            $userData->fullName = $request->fullName;
            $userData->email = $request->email;
            //            $userData->phone = $request->phone;
            $userData->role = $request->role;
            if ($request->role == 'super_admin') {
                $userData->role = 'super_admin';
            } else {
                $userData->role = $request->role;
            }

            if (empty($request->password_change)) {
            } else {
                $userData->password = bcrypt($request->password_change);
            }
            $userData->update($request->all());

            return back()->with('notification', [
                'class' => 'success',
                'message' => 'User Updated.'
            ]);
        } else {
            return redirect('/admin/no-permissions');
        }
    }

    public function destroy(Request $request)
    {
        // dd($request);
        $storeData = [];
        
        foreach ($request->delete_item as $key => $item) {
            $findData = User::find($key);
            array_push($storeData, $findData->role);

            User::where('id', $key)->delete();
            // Messages::where('uid', $key)->delete();
            // Connect::where('uid', $key)->delete();
            // Design::where('uid', $key)->delete();
            // Projects::where('uid', $key)->delete();
        }
        if($storeData[0] == 'customer'){
            return redirect('/admin/users/customer/customer')->with('notification', [
                'class' => 'success',
                'message' => 'Items deleted.'
            ]);
        }else{
            return redirect('/admin/users/admins/admin')->with('notification', [
                'class' => 'success',
                'message' => 'Items deleted.'
            ]);
        }
    }

    public function AuthRouteAPI(Request $request)
    {
        return $request->user();
    }
}
