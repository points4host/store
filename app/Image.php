<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    protected $fillable = [
        'name',
        'is_active',
        'order',
        'is_master',
        'product_id'
    ];
}
