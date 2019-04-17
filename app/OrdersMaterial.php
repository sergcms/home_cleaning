<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdersMaterial extends Model
{
    protected $fillable = [
        'order_id',
        'stainless_steel_application',
        'type_stove',
        'shower_doors_glass',
        'mold',
        'areas_needing_attention',
        'additional_info',
    ];

    public function order()
    {
        return $this->hasOne('App\Order'); 
    }
}
