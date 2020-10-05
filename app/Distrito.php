<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    protected $table = 'DISTRITOS';
    protected $primaryKey = 'IDDISTRITO';
    protected $guarded = [''];

    public function departamento() {
        return $this->hasOne('App\Departamento','IDDEPARTAMENTO','IDDEPARTAMENTO');
    }

    public function provincia() {
        return $this->hasOne('App\Provincia','IDPROVINCIA','IDPROVINCIA');
    }

    public function distrito(){
        return $this->hasMany('App\Distrito','IDDISTRITO','IDDISTRITO');
    }
}

