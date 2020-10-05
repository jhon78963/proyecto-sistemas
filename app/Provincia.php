<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    protected $table = 'PROVINCIAS';
    protected $primaryKey = 'IDPROVINCIA';
    protected $guarded = [''];

    public function distritos(){
        return $this->hasMany(Distrito::class,'IDPROVINCIA','IDPROVINCIA');
    }

    public function alumnos(){
        return $this->hasMany(Alumno::class,'IDPROVINCIA','IDPROVINCIA');
    }
}
