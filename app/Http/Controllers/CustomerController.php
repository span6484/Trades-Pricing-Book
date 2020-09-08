<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $pageHeading = 'Customers';

        $customers = \App\Customer::all();
  
        return view('customers', compact('pageHeading', 'customers'));
    }
}
