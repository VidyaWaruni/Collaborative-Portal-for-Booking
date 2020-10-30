<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banquet extends Model
{
    protected $fillable = [
        'banquet_name','banquet_details','banquet_price','max_Capacity','restaurant_address','restaurant_contact','image'
    ];
}

