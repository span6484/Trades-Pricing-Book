<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'suppliers';
    protected $primaryKey = 'pk_supplier_id';
    protected $fillable = [
        'supplier_companyname',
        'supplier_contactname',
        'supplier_phone',
        'supplier_email'
    ];

    protected $attributes = [
        'supplier_archived' => 0
        ];

}
