<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bot extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected  $fillable = ['botKey', 'ip', 'country', 'os', 'bot_version','panel_credential_id'];


    /**
     * Relation To Connection
     *
     */

    public function connection(){
        return $this->hasMany(Connection::class);
    }

    /**
     * Relation to Obeyed
     *
     */

    public function Obeyed(){
        return $this->hasMany(Obeyed::class);
    }

    /**
     * Relation panelCredentials
     *
     */

    public function panel(){
        return $this->belongsTo(panelCredential::class);
    }





}
