<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obeyed extends Model
{

    /**
     * @var array
     */
    protected $fillable = ['bot_id','order_id'];

    /**
     * Relation to bot
     */

    public function bot(){
        return $this->belongsTo(Bot::class);
    }

    /**
     * Relation to order
     */

    public function order(){
        return $this->belongsTo(Order::class);
    }
}
