<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BusinessDetail;

class BusinessDetailController extends Controller
{
       public function index()
    {
        $pageHeading = 'Business Details';

        return view('admin', compact('pageHeading'));
    }
}
