<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meetinghalls extends Model
{
    protected $fillable = [
        'meetinghall_name','meetinghall_details','meetinghall_price','max_Capacity','meetinghall_address','meetinghall_contact','image'
    ];
}
