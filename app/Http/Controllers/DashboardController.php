<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        //
        $pageHeading = 'Dashboard';
  
        return view('dashboard',compact('pageHeading') );
    }

}
