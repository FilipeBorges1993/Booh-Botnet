<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userStatus extends Model
{

    protected $fillable = ['user_id','status'];

    public function  user(){
        return $this->belongsTo(User::class);
    }

}
