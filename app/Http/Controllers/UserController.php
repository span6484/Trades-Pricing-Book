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
            'user_firstlast' => 'required',
            'user_password' => 'required'
        ]);

        $newUser = new User([
            'user_name' => $request->get('user_name'),
            'user_firstlast' => $request->get('user_firstlast'),
            'user_password' => $request->get('user_password'),
            'user_type' => $request->get('user_type'),
            'user_archived' => $request->get('user_archived')
        ]);
        $newUser->save();
        return back()->with('success', 'User added');
    }

    public function edit($pk_user_id)
    {
        $pageHeading = 'User Management';
        $users = User::find($pk_user_id);

        return view('editlayouts.useredit', compact('users', 'pk_user_id', 'pageHeading'));
    }

    public function update(Request $request, $pk_user_id)
    {

        $this->validate($request,[
            'user_name' => 'required',
            'user_firstlast' => 'required',
            'user_password' => 'required'
        ]);
        
        $users = User::find($pk_user_id);
        $users->user_name = $request->get('user_name');
        $users->user_firstlast = $request->get('user_firstlast');
        $users->user_password = $request->get('user_password');
        $users->user_type = $request->get('user_type');
        $users->user_archived = $request->get('user_archived');
        $users->save();

        return redirect()->route('users.index')->with('success', 'User updated');
    }

}
