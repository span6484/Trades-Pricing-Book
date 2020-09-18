<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'itemcategories';
    protected $primaryKey = 'pk_category_id';
    protected $fillable = [
            'category_name', 
        ];

    protected $attributes = [
        'category_archived' => 0
        ];

    public function subCategories()
    {
        return $this->hasMany('App\SubCategory', 'fk_category_id', 'pk_category_id');
    }
}
