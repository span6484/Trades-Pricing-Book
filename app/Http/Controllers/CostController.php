<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmployeeCost;
use App\Discount;

class CostController extends Controller
{
       public function grossMargin()
    {
        $pageHeading = 'Gross Margin';
        $uncollapsed = 'true';

        return view('grossmargin', compact('pageHeading', 'uncollapsed'));
    }

    public function index()
    {
        $pageHeading = 'Total Business Costs';

        return view('totalcosts', compact('pageHeading'));
    }

    public function companyCosts()
    {
        $pageHeading = 'Company Costs';

        return view('companycosts', compact('pageHeading'));
    }

    
}
