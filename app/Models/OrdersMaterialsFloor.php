<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdersMaterialsFloor extends Model
{
    protected $fillable = [ ];

    protected $guarded = ['id'];

    public function order()
    {
        return $this->hasOne('App\Models\Order'); 
    }
}
