<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    protected $fillable = [
        'user_id',
        'bedrooms',
        'bathrooms',
        'address',
        'phone',
        'city',
        'apt',
        'zip_code',
        'square_footage',
        'payment', 
    ];

    public function user()
    {
        return $this->hasOne('App\User');
    }
}
