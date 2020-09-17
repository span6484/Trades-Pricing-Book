<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubCategory;

class SubCategoryController extends Controller
{
    public function index()
    {
        $pageHeading = 'Category Management';

        $subcategories = SubCategory::all();
  
        return view('categories', compact('pageHeading', 'categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'subcategory_name' => 'required',
            'fk_category_id' => 'required'
        ]);

        $newSubCategory = new SubCategory([
            'subcategory_name' => $request->get('subcategory_name'),
            'fk_category_id' => $request->get('parent_category_name'),
        ]);
        
        $newSubCategory->save();
        return back()->with('success', 'Sub-Category added');
    }
}
