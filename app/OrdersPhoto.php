<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdersPhoto extends Model
{
    protected $fillable = [
        'order_id',
        'url',
    ];

    public function order()
    {
        return $this->hasOne('App\Order'); 
    }
}
