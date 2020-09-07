<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $pageHeading = 'Hello from UserController.';

        return view('users', compact('pageHeading'));
    }
}
