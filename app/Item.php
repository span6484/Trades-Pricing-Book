<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    protected $primaryKey = 'pk_item_id';
    protected $fillable = [
        'material_itemcode',
        'material_description',
        'material_cost',
        'fk_supplier_id'
    ];

    protected $attributes = [
        'material_archived' => 0
        ];

}
