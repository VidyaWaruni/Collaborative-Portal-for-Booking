<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{

    protected $fillable = [
        'hotel_name','hotel_category','hotel_address','hotel_contact','hotel_details','contact','image'
    ];

}
