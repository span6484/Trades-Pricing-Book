<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Material;

class MaterialController extends Controller
{
    public function index()
    
    {
        $pageHeading = 'Materials';

        $materials = Material::all();

        return view('materials', compact('pageHeading', 'materials'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'supplier_companyname' => 'required',
        ]);

        $newMaterial = new Material([
            'supplier_companyname' => $request->get('supplier_companyname'),
            'supplier_contactname' => $request->get('supplier_contactname'),
            'supplier_phone' => $request->get('supplier_phone'),
            'supplier_email' => $request->get('supplier_email'),
        ]);
        $newMaterial->save();
        return back()->with('success', 'Material added');
    }
}
