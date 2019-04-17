<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdersExtra extends Model
{
    protected $fillable = [
        'order_id',
        'inside_fridge',
        'inside_oven',
        'garage_swept',
        'inside_cabinets',
        'laundry_wash_dry',
        'bed_sheet_change',
        'blinds_cleaning',
        'on_weekend',
        'carpet_cleaned',
    ];

    public function order()
    {
        return $this->hasOne('App\Order'); 
    }
}
