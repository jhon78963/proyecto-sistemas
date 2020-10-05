<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = 'DEPARTAMENTOS';
    protected $primaryKey = 'IDDEPARTAMENTO';
    protected $guarded = [''];

    public function distritos(){
        return $this->hasMany(Distrito::class,'IDDEPARTAMENTO','IDDEPARTAMENTO');
    }

    public function alumnos(){
        return $this->hasMany(Alumno::class,'IDDEPARTAMENTO','IDDEPARTAMENTO');
    }
}
