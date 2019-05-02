<?php 

namespace App\Traits;

use Validator;

trait ValidatorTrait 
{
    // check validate data
    public function Validator ($data, $rules) {
        return Validator::make($data, $rules)->validate();
    }
}