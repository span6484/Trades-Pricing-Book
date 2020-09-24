<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmployeeCost;
use App\Discount;

class CostController extends Controller
{

    public function index()
    {
        $pageHeading = 'Total Business Costs';

        return view('totalcosts', compact('pageHeading'));
    }



    
}
