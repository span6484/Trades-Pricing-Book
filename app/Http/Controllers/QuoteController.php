<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quote;
use App\BusinessDetail;
use App\Customer;

class QuoteController extends Controller
{
    public function index()
        {
            $pageHeading = 'Quoting';
            $quotes = Quote::all();
            $businessDetails = BusinessDetail::first();
            $customers = Customer::all();
    
            return view('quoting', compact('pageHeading', 'quotes', 'businessDetails', 'customers'));
        }
}
