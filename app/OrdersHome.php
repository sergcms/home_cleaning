<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdersHome extends Model
{
    protected $fillable = [
        'order_id',
        'pet',
        'count_pets',
        'adults_people',
        'children',
        'rate_home_cleanlines',
        'cleaning_before',
    ];

    public function order()
    {
        return $this->hasOne('App\Order'); 
    }
}
