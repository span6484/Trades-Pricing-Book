<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    protected $table = 'itemcategories';
    protected $primaryKey = 'pk_category_id';
    protected $fillable = [
            'category_name', 
        ];

    protected $attributes = [
        'category_archived' => 0
        ];
}
