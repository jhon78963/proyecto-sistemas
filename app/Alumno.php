<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $primaryKey = 'IDALUMNO';
    protected $table = 'ALUMNOS';
    protected $guarded = [''];

    public function pais() {
        return $this->hasOne('App\Pais','IDPAIS','IDPAIS');
    }

    public function departamento() {
        return $this->hasOne('App\Departamento','IDDEPARTAMENTO','IDDEPARTAMENTO');
    }

    public function provincia() {
        return $this->hasOne('App\Provincia','IDDEPARTAMENTO','IDDEPARTAMENTO');
    }

    public function distrito() {
        return $this->hasOne('App\Distrito','IDDISTRITO','IDDISTRITO');
    }
}
