<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index(User $user, Request $request)
    {
        try {
            $users = $user->allData($request);
            return view('admin.users.index', compact('users'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function edit(User $user)
    {
        try {
            return view('admin.users.edit', compact('user'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function checkEmailExists(Request $request)
    {

        $user = User::where('email', $request->email)->first();
        if ($user) {
            return response()->json(['success' => 1, 'message' => 'This email has already been used'], 200);
        }
        return response()->json(['success' => 0, 'message' => ''], 200);
    }
}
