<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loginAttempt extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'ip',  'password', 'username', 'attempt'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
}
