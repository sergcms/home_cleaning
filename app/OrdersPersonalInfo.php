<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdersPersonalInfo extends Model
{
    protected $fillable = [
        'order_id',
        'cleaning_frequency',
        'cleaning_type',
        'cleaning_date',
    ];

    public function order()
    {
        return $this->hasOne('App\Order'); 
    }
}
