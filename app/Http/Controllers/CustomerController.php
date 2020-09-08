<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $pageHeading = 'Customers';

        $customers = Customer::all();
        // $customers = Customer::with('getCustomerRelation')->get();

        // dd($customers);
  
        return view('customers', compact('pageHeading', 'customers'));
    }
}
