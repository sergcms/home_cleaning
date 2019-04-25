<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdersPhoto extends Model
{
    protected $fillable = [
        'order_id',
        'url',
    ];

    public function order()
    {
        return $this->hasOne('App\Models\Order'); 
    }
}
