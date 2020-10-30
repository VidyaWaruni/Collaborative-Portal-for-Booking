<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'firstname','lastname','productcategory','firstname','lastname','email','contact','address','country'
    ];
}
