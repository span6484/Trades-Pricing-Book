<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'user_name'=>'jconceicao',
            'user_firstlast'=>'Jason Conceicao',
            'user_password'=>'password',
            'user_type'=>'Admin',
            'user_archived'=>'0'
        ]);
    }
}
