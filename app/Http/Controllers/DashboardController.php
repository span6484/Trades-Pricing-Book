<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        //
        $pageHeading = 'Dashboard';
        $result = DB::table('companycosts')
            ->select(
                DB::raw('companycost_name as companycost_name'),
                DB::raw('companycost_yearly as companycost_yearly'),
                DB::raw('companycost_archived as companycost_archived')
            )
            ->get();

        $array[] = ['companycost_name', 'companycost_yearly', 'companycost_archived'];
        foreach ($result as $key => $value) {
            $array[++$key] = [$value->companycost_name, $value->companycost_yearly, $value->companycost_archived];
        }


        //
        $result1 = DB::table('discounts')
        ->select(
            DB::raw('discount_name as discount_name'),
            DB::raw('discount_rate as discount_rate'),
            DB::raw('discount_archived as discount_archived')
        )
        ->get();
        $array1[] = ['discount_name', 'discount_rate', 'discount_archived'];
        foreach ($result1 as $key => $value) {
            $array1[++$key] = [$value->discount_name, $value->discount_rate, $value->discount_archived];
        }
        return view('dashboard',[
            'pageHeading' => $pageHeading,
            'companycost_name'=>json_encode($array),
            'discount_name'=>json_encode($array1)]);
    }
}
