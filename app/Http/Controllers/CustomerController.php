<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $pageHeading = 'Customers';
  
        return view('users', compact('pageHeading'));
    }
}
