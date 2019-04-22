<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    protected $fillable = [ ];

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function personalInfo()
    {
        return $this->hasOne('App\OrdersPersonalInfo');
    }

    public function home()
    {
        return $this->hasOne('App\OrdersHome');
    }

    public function photos()
    {
        return $this->hasMany('App\OrdersPhoto');
    }

    public function materials()
    {
        return $this->hasOne('App\OrdersMaterial');
    }

    public function materialsCountertop()
    {
        return $this->hasOne('App\OrdersMaterialsCountertop');
    }

    public function materialsFloor()
    {
        return $this->hasOne('App\OrdersMaterialsFloor');
    }

    public function extras()
    {
        return $this->hasOne('App\OrdersExtra');
    }
}
