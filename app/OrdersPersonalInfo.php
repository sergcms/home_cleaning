<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdersPersonalInfo extends Model
{
    protected $fillable = [ ];

    protected $guarded = ['id'];

    public function order()
    {
        return $this->belongsTo('App\Order'); 
    }
}
