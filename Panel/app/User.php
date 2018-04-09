<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',  'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * relation panel key
     *
     */

    public function panelCredential(){
        return $this->hasOne(panelCredential::class);
    }

    /**
     * Status
     */
    public function status(){
        return $this->hasOne(userStatus::class);
    }
}
