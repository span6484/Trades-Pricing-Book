<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TotalBUssinessCost extends Model
{
    protected $table = 'grossmargins';
    protected $primaryKey = 'pk_gm_id';
    protected $fillable = [
            'gm_rate', 
        ];

}   
