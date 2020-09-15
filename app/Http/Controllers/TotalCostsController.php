<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\EmployeeCost;
use App\Discount;
use App\GrossMargin;
use App\TotalCosts;


class TotalCostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pageHeading = 'Total Bussiness Cost';
  
        return view('totalcosts',compact('pageHeading') );
    }

}
