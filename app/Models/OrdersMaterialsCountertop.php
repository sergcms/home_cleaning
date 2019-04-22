<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdersMaterialsCountertop extends Model
{
    protected $fillable = [ ];

    protected $guarded = ['id'];

    public function order()
    {
        return $this->hasOne('App\Models\Order'); 
    }
}
