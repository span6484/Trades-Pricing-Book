<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PriceList;
use App\Material;
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
    
}
