<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inquery extends Model
{
    protected $fillable = [
        'name','date','time','message'
    ];

}
