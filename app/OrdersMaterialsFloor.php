<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdersMaterialsFloor extends Model
{
    protected $fillable = [
        'order_id',
        'hardwood',
        'cork',
        'vinyl',
        'concrete',
        'carpet',
        'natural_stone',
        'tile',
        'laminate',
    ];

    public function order()
    {
        return $this->hasOne('App\Order'); 
    }
}
