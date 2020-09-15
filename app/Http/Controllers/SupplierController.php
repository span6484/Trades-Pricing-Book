<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;

class SupplierController extends Controller
{
    public function index()
    
    {
        $pageHeading = 'Suppliers';

        $suppliers = Supplier::all();

        return view('suppliers', compact('pageHeading', 'suppliers'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'supplier_companyname' => 'required',
        ]);

        $newSupplier = new Supplier([
            'supplier_companyname' => $request->get('supplier_companyname'),
            'supplier_contactname' => $request->get('supplier_contactname'),
            'supplier_phone' => $request->get('supplier_phone'),
            'supplier_email' => $request->get('supplier_email'),
        ]);
        $newSupplier->save();
        return back()->with('success', 'Supplier added');
    }

}
