<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PriceList;
use App\Material;
use App\Category;
use App\SubCategory;

class PriceListController extends Controller
{
    public function index()
    {
        $pageHeading = 'Price List';
        $priceLists = PriceList::all();
        $materials = Material::all();
        $subCategories = SubCategory::all();
  
        return view('pricelists', compact('pageHeading', 'priceLists', 'materials', 'subCategories'));
    }

    public function show($id="")
    {
        $pageHeading = 'Price List';
        if ($id=="")
        {
            // $category = Category::all();
        } else {
            $category = Category::find($id);
        }
        $subCategories = $category->subCategories;
        $categoryName = $category->category_name;
        $materials = Material::all();
  
        return view('pricelists', compact('pageHeading', 'materials', 'subCategories', 'categoryName'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'item_number' => 'required',
            'item_jobtype' => 'required',
            'fk_subcategory_id' => 'required',
            'item_description' => 'required',
            'fk_material_id' => 'required',
            'item_estimatedtime' => 'required',
            'item_servicecall' => 'required',
        ]);

        $priceLists = new PriceList([
            'item_number'  => $request->get('item_number'),
            'item_jobtype'  => $request->get('item_jobtype'),
            'fk_subcategory_id'	=> $request->get('fk_subcategory_id'),
            'item_description'  => $request->get('item_description'),
            'fk_material_id'  => $request->get('fk_material_id'),
            'item_estimatedtime'  => $request->get('item_estimatedtime'),
            'item_servicecall'  => $request->get('item_servicecall'),
        ]);

        $priceLists->save();
        return back()->with('success', 'Product added');    
    }

    public function edit($pk_item_id)
    {
        $pageHeading = 'Price List';
        $priceLists = PriceList::find($pk_item_id);
        $subCategories = SubCategory::all();
        $materials = Material::all();

        return view('editlayouts.pricelistedit', compact('priceLists', 'pk_item_id', 'pageHeading', 'subCategories', 'materials'));
    }

    public function update(Request $request, $pk_item_id)
    {

        $this->validate($request,[
            'item_number' => 'required',
            'item_jobtype' => 'required',
            'fk_subcategory_id' => 'required',
            'item_description' => 'required',
            'fk_material_id' => 'required',
            'item_estimatedtime' => 'required',
            'item_servicecall' => 'required',
        ]);
        
        $priceLists = PriceList::find($pk_item_id);
        $priceLists->item_number = $request->get('item_number');
        $priceLists->item_jobtype = $request->get('item_jobtype');
        $priceLists->fk_subcategory_id = $request->get('fk_subcategory_id');
        $priceLists->item_description = $request->get('item_description');
        $priceLists->fk_material_id = $request->get('fk_material_id');
        $priceLists->item_estimatedtime = $request->get('item_estimatedtime');
        $priceLists->item_servicecall = $request->get('item_servicecall');
        $priceLists->save();

        return redirect()->route('pricelists.index')->with('success', 'Product updated');
    }
    
}
