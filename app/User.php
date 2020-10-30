<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Auth\Passwords\CanResetPassword;


class User extends Model implements Authenticatable, CanResetPasswordContract
{
    use \Illuminate\Auth\Authenticatable;
    use CanResetPassword;
    use Notifiable;

    protected $fillable = [
        'name','address','email','contact','avatar'
    ];

}
