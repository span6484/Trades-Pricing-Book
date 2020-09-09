<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CostController extends Controller
{
       public function index()
    {
        $pageHeading = 'Costs & Expenses';

        // $customers = Customer::all();
  
        return view('costs', compact('pageHeading', 'customers'));
    }
}
