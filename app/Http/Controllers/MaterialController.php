<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Material;
use App\Supplier;

class MaterialController extends Controller
{
    public function index()
    
    {
        $pageHeading = 'Materials';

        $materials = Material::all();

        $suppliers = Supplier::all();

        return view('materials', compact('pageHeading', 'materials', 'suppliers'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'material_description' => 'required',
            'material_cost' => 'required',
        ]);

        $newMaterial = new Material([
            'material_itemcode' => $request->get('material_itemcode'),
            'material_description' => $request->get('material_description'),
            'material_cost' => $request->get('material_cost'),
            'fk_supplier_id' => $request->get('fk_supplier_id'),
        ]);
        $newMaterial->save();
        return back()->with('success', 'Material added');
    }
}
