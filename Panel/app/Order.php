<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
  protected $fillable = ['action', 'data', 'status','panel_credential_id'];

    /**
     * Relation to Obeyed
     *
     */

  public function Obeyed(){
    return $this->hasMany(Obeyed::class);
  }

  /**
   * Relation to PanelCredentials
   *
   */

  public function panelCredentials(){
    return $this->belongsTo(panelCredential::class);
  }


}
