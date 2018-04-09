<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class panelCredential extends Model
{
    protected $fillable = ['user_id','panelKey','cryptKey',];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function bots(){
        return $this->hasMany(Bot::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }

}
