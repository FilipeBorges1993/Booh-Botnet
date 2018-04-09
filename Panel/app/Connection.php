<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Connection extends Model
{
    /**
     * @var array
     *
     */
    protected $fillable = ['bot_id'];

    /**
     * Relation to Bot
     *
     *
     */

    public function bot(){
        return $this->belongsTo(Bot::class);
    }

}
