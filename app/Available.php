<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Available extends Model
{
    protected $fillable = [
        'pro_id','available_date','status','daySingle','nightSingle','dayDouble','daySuite','nightSuite','time_from','time_to','date_to'
    ];
}
