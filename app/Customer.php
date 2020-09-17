<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    protected $table = 'customers';
    protected $primaryKey = 'pk_customer_id';
    protected $fillable = [
            'customer_name', 
            'customer_company', 
            'customer_phone',
            'customer_email', 
            'customer_address', 
            'fk_discount_id'
        ];

    protected $attributes = [
        'customer_archived' => 0
        ];
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

    public function discount()
    {
        return $this->belongsTo('App\Discount', 'fk_discount_id', 'pk_discount_id');
    }
}
