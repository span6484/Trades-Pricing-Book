<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quote;
use App\BusinessDetail;
use App\Customer;
use App\Category;
use App\SubCategory;
use App\PriceList;
use App\QuoteTerm;
use App\Discount;

class QuoteController extends Controller
{
    public function index()
        {
            $pageHeading = 'Quoting';
            $quotes = Quote::all();
            $businessDetails = BusinessDetail::first();
            $customers = Customer::all();
            $categories = Category::all();
            $subCategories = SubCategory::all();
            $priceLists = PriceList::all();
            $quoteterms = QuoteTerm::all();
            $discounts = Discount::all();
    
            return view('quoting', compact('pageHeading', 'quotes', 'businessDetails', 'customers', 'categories', 'subCategories', 'priceLists', 'quoteterms', 'discounts'));
        }

        public function show($id="")
    {
        $pageHeading = 'Quoting';
        $category = Category::find($id);
        $subCategories = $category->subCategories;
        $categoryName = $category->category_name;
  
        return view('quoting', compact('pageHeading', 'subCategories', 'categoryName'));
    }

}
