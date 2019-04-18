<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdersExtra extends Model
{
    protected $fillable = [ ];

    protected $guarded = ['id'];

    public function order()
    {
        return $this->hasOne('App\Order'); 
    }
}
