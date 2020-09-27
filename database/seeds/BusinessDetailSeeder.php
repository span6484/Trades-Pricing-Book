<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusinessDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('businessdetails')->insert([
            'businessdetail_name'=>'Xceed Electrical',
            'businessdetail_addressline1'=>'PO Box 492',
            'businessdetail_addressline2'=>'Moorebank NSW 1875',
            'businessdetail_phone'=>'0415240296',
            'businessdetail_fax'=>'02 9730 2641',
            'businessdetail_email'=>'info@xceedelectrical.com.au',
            'businessdetail_website'=>'www.xceedelectrical.com.au',
            'businessdetail_archived'=>0
        ]);
    }
}
