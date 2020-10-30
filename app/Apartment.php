<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable = [
        'apartment_name','apartment_price','apartment_type','apartment_details','apartment_address','apartment_contact','apartment_details','image'
    ];
}

