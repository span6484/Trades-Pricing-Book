<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
       public function index()
    {
        $pageHeading = 'Admin Panel';

        return view('admin', compact('pageHeading'));
    }
}
