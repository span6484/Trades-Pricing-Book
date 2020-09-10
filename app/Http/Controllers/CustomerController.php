<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Discount;

class CustomerController extends Controller
{
    public function index()
    {
        $pageHeading = 'Customers';

        $customers = Customer::all();

        $discounts = Discount::all();
  
        return view('customers', compact('pageHeading', 'customers', 'discounts'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'customer_name' => 'required'
        ]);

        $newCustomer = new Customer([
            'customer_name' => $request->get('customer_name'),
            'customer_company' => $request->get('customer_company'),
            'customer_phone' => $request->get('customer_phone'),
            'customer_email' => $request->get('customer_email'),
            'customer_address' => $request->get('customer_address'),
            'fk_discount_id' => $request->get('customer_discount'),
        ]);
        $newCustomer->save();
        return back()->with('success', 'Customer added');
        // return view('customers')->with('success', 'Data Added');
        // return view('customers');
    }
    
}
