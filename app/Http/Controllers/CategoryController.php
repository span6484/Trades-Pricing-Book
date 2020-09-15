<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ItemCategory;

class CategoryController extends Controller
{
    public function index()
    {
        $pageHeading = 'Categories';

        $categories = ItemCategory::all();
  
        return view('categories', compact('pageHeading', 'categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required'
        ]);

        $newCategory = new ItemCategory([
            'category_name' => $request->get('category_name'),
        ]);
        
        $newCategory->save();
        return back()->with('success', 'Category added');
        // return view('customers')->with('success', 'Data Added');
        // return view('customers');
    }
}
