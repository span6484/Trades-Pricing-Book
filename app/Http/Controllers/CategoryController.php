<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\SubCategory;

class CategoryController extends Controller
{
    public function index()
    {
        $pageHeading = 'Category Management';

        $categories = Category::all();
        $subcategories = SubCategory::all();
  
        return view('categories', compact('pageHeading', 'categories', 'subcategories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required'
        ]);

        $newCategory = new Category([
            'category_name' => $request->get('category_name'),
        ]);
        
        $newCategory->save();
        return back()->with('success', 'Category added');
    }

    public function show($pk_category_id)
    {

        $categories = Category::find($pk_category_id);
        $subcategories = $categories->subCategories;

        $pageHeading = 'Category Management';
  
        return view('categories', compact('pageHeading', 'categories', 'subcategories'));
    }

}
