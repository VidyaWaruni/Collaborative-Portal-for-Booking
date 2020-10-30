<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = [
        'restaurant_name','restaurant_address','restaurant_contact','restaurant_function', 'max_Capacity','restaurant_details','image'
    ];
}
