<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuoteTerm;

class QuoteTermsController extends Controller
{
    public function index()
    
    {
        $pageHeading = 'Quote Terms';

        $quoteterms = QuoteTerm::all();


        return view('quoteterms', compact('pageHeading', 'quoteterms'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'term_name' => 'required',
            'term_body' => 'required',
        ]);

        $newQuoteTerm = new QuoteTerm([
            'term_name' => $request->get('term_name'),
            'term_body' => $request->get('term_body'),
        ]);
        $newQuoteTerm->save();
        return back()->with('success', 'Quote terms added');
    }
}
