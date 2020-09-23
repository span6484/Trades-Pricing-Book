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
        $this->validate($request,[
            'add_gm_rate' => 'required',
        ]);

        $newGrossMargin = new GrossMargin([
            'gm_rate'  => $request->get('add_gm_rate'),
        ]);

        $newGrossMargin->save();
        return back()->with('success', 'GM Rate Added');    
    }

    public function edit($pk_gm_id)
    {
        $pageHeading = 'Gross Margin';
        $grossmargin = GrossMargin::find($pk_gm_id);

        return view('editlayouts.grossmarginedit', compact('grossmargin', 'pk_gm_id', 'pageHeading'));
    }

    public function update(Request $request, $pk_gm_id)
    {

        $this->validate($request,[
                    'gm_rate' => 'required',
                ]);

        $grossmargin = GrossMargin::find($pk_gm_id);
        $grossmargin->gm_rate = $request->get('gm_rate');
        $grossmargin->save();

        return redirect()->route('grossmargin.index')->with('success', 'GM rate updated');
    }

}
