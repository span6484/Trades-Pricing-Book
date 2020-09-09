<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmployeeCost;

class CostController extends Controller
{
       public function grossMargin()
    {
        $pageHeading = 'Gross Margin';
        $uncollapsed = 'true';

        return view('grossmargin', compact('pageHeading', 'uncollapsed'));
    }

    public function totalCosts()
    {
        $pageHeading = 'Total Business Costs';

        return view('totalcosts', compact('pageHeading'));
    }

    public function employeeCosts()
    {
        $pageHeading = 'Employee Costs';

        $employeeCosts = EmployeeCost::all();

        return view('employeecosts', compact('pageHeading', 'employeeCosts'));
    }

    public function companyCosts()
    {
        $pageHeading = 'Company Costs';

        return view('companycosts', compact('pageHeading'));
    }

    public function discounts()
    {
        $pageHeading = 'Discounts';
  
        return view('discounts', compact('pageHeading'));
    }
}
