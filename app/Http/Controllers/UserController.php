<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $pageHeading = 'Users';

        $users = [
            'User 1',
            'User 2',
            'User 3',
            'User 4'
        ];

        return view('users', compact('users'));
    }
}
