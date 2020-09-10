<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function index()
        {
            $pageHeading = 'Quoting';

            // $customers = Customer::all();
            // $customers = Customer::with('getCustomerRelation')->get();

            // dd($customers);
    
            return view('quoting', compact('pageHeading'));
        }
}
