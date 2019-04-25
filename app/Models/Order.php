<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    protected $fillable = [ ];

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function personalInfo()
    {
        return $this->hasOne('App\Models\OrdersPersonalInfo');
    }

    public function home()
    {
        return $this->hasOne('App\Models\OrdersHome');
    }

    public function photos()
    {
        return $this->hasMany('App\Models\OrdersPhoto');
    }

    public function materials()
    {
        return $this->hasOne('App\Models\OrdersMaterial');
    }

    public function materialsCountertop()
    {
        return $this->hasOne('App\Models\OrdersMaterialsCountertop');
    }

    public function materialsFloor()
    {
        return $this->hasOne('App\Models\OrdersMaterialsFloor');
    }

    public function extras()
    {
        return $this->hasOne('App\Models\OrdersExtra');
    }
}
