<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{


    
    protected $table = 'customers';
    protected $primaryKey = 'pk_customer_id';
    // protected $attributes = [
    //     'fk_discount_id' => 1,
    // ];

    // $customers = App\Customer::all();

    // foreach ($customers as $customer)
    // {
    //     echo $customer->name;
    // }

    // public function discount(){
    //     return $this->belongsTo('App\Discount', 'pk_discount_id', 'pk_customer_id');
    // }

}
