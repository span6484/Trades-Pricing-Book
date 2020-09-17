<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\EmployeeCost;
use App\Discount;
use App\GrossMargin;
use App\CompanyCost;
use Faker\Provider\ar_JO\Company;

class CompanyCostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageHeading = 'Company Costs';

        $companycosts = CompanyCost::all();
  
        return view('companycosts', compact('pageHeading', 'companycosts'));
    }

    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'companycost_name' => 'required',
        ]);

        $newCompanyCost = new CompanyCost([
            'companycost_name'  => $request->get('companycost_name'),
            'companycost_yearly'  => $request->get('companycost_yearly'),
            'companycost_archived'	=> $request->get('companycost_archived')
        ]);

        $newCompanyCost->save();
        return back()->with('success', 'Company Cost added');    
    }
}
