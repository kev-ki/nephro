<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    /*protected $guarded = [];*/
    protected $table = 'patients';
    public $incrementing = false;

    protected $primaryKey = 'idpatient';

    public function dossier() {
        return $this->hasOne(Dossier::class);
    }
}
