<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

    public function index()
    
    {
        $pageHeading = 'User Management';

        $users = User::all();

        return view('users', compact('pageHeading', 'users'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'user_name' => 'required',
            'user_fullname' => 'required',
            'user_password' => 'required'
        ]);

        $newUser = new User([
            'user_name' => $request->get('user_name'),
            'user_firstlast' => $request->get('user_firstlast'),
            'user_password' => $request->get('user_password'),
        ]);
        $newUser->save();
        return back()->with('success', 'User added');
    }

}
