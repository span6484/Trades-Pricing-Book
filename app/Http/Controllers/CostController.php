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

    public function totalCosts()
    {
        $pageHeading = 'Total Business Costs';

        return view('totalcosts', compact('pageHeading'));
    }

    public function index()
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

        $discounts = Discount::all();
  
        return view('discounts', compact('pageHeading', 'discounts'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'employee_name' => 'required'
        ]);

        $newEmployee = new EmployeeCost([
            'employee_name' => $request->get('employee_name'),
            'employee_basehourly'=> $request->get('employee_basehourly'),
            'employee_vehiclecost' => $request->get('employee_vehiclecost'),
            'employee_otherweeklycost' => $request->get('employee_otherweeklycost'),
            'employee_phone' => $request->get('employee_phone'),
            'employee_workercomp' => $request->get('employee_workercomp')
        ]);

        $newEmployee->save();
        return back()->with('success', 'Employee added');
    }
}
