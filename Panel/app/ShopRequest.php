<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopRequest extends Model
{
    protected $fillable = ['email', 'discord', 'textInfo', 'transactionID', 'status','user_id','menu'];
}
