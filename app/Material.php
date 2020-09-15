<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'materials';
    protected $primaryKey = 'pk_material_id';
    protected $fillable = [
        'material_itemcode',
        'material_description',
        'supplier_phone',
        'supplier_email'
    ];

    protected $attributes = [
        'material_archived' => 0
        ];
}
