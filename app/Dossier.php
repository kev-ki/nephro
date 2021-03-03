<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dossier extends Model
{
    public $incrementing = false;

    protected $primaryKey = 'numD';

    /*public function patient() {
        return $this->belongsTo('App\Patient');
    }*/

}
