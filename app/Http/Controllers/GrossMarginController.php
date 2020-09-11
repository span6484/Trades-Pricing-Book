<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\EmployeeCost;
use App\Discount;
use App\GrossMargin;

class GrossMarginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pageHeading = 'Gross Margin';

        $grossmargin = GrossMargin::all();
  
        return view('grossmargin', compact('pageHeading', 'grossmargin'));
    }


    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'gm_rate' => 'required',
        ]);

        $newGrossMargin = new GrossMargin([
            'gm_rate'  => $request->get('gm_rate'),
        ]);

        $newGrossMargin->save();
        return back()->with('success', 'gm_rate added');    
    }
}
