<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdersPersonalInfo extends Model
{
    protected $fillable = [ ];

    protected $guarded = ['id'];

    public function order()
    {
        return $this->belongsTo('App\Models\Order'); 
    }
}
