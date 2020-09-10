<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $pageHeading = 'Users';

        $sidebarItems = [
            'Add User',
            'Edit User',
            'Delete User',
            'Delete User',
            'Delete User',
            'Delete User',
            'Delete User',
            'Delete User',
            'Delete User',
            'Delete User',
            'Delete User',
            'Delete User'
        ];

        return view('users', compact('pageHeading', 'sidebarItems'));
    }

}
