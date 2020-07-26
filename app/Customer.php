<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    protected $fillable = [
        'name', 'phone', 'password','confPassword','image'
    ];
    public function getImageAttribute($value){
        return !is_null($value) ? url('images/'. $value) : '';
    }
}
