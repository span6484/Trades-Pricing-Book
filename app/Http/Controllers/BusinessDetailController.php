<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BusinessDetail;

class BusinessDetailController extends Controller
{
       public function index()
    {
        $pageHeading = 'Business Details';
        $businessDetails = BusinessDetail::all();

        return view('businessdetails', compact('pageHeading', 'businessDetails'));
    }

    public function edit($pk_businessdetail_id)
    {
        $pageHeading = 'Business Details';
        $businessDetails = BusinessDetail::find($pk_businessdetail_id);

        return view('editlayouts.businessdetailedit', compact('businessDetails', 'pk_businessdetail_id', 'pageHeading'));
    }

    public function update(Request $request, $pk_businessdetail_id)
    {

        $this->validate($request,[
                    'customer_name' => 'required',
                ]);
        
        $businessDetails = BusinessDetail::find($pk_businessdetail_id);
        $businessDetails->businessdetail_name = $request->get('businessdetail_name');
        $businessDetails->businessdetail_addressline1 = $request->get('businessdetail_addressline1');
        $businessDetails->businessdetail_addressline2 = $request->get('businessdetail_addressline2');
        $businessDetails->businessdetail_phone = $request->get('businessdetail_phone');
        $businessDetails->businessdetail_fax = $request->get('businessdetail_fax');
        $businessDetails->businessdetail_email = $request->get('businessdetail_email');
        $businessDetails->businessdetail_website = $request->get('businessdetail_website');
        $businessDetails->businessdetail_archived = $request->get('businessdetail_archived');
        $businessDetails->save();

        return redirect()->route('businessdetails.index')->with('success', 'Business details updated');
    }

}
