<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $pageHeading = 'Category Management';

        $categories = Category::all();
  
        return view('categories', compact('pageHeading', 'categories'));
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
}
