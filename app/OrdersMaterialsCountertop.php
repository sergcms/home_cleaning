<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdersMaterialsCountertop extends Model
{
    protected $fillable = [
        'order_id',
        'concrete',
        'quartz',
        'formica',
        'granite',
        'marble',
        'tile',
        'paper_stone',
        'butcher_block',
    ];

    public function order()
    {
        return $this->hasOne('App\Order'); 
    }
}
