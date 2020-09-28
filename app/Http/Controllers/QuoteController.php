<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BusinessDetail;

class QuoteController extends Controller
{
    public function index()
        {
            $pageHeading = 'Quoting';
    
            return view('quoting', compact('pageHeading'));
        }
}
