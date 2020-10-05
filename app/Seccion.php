<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    //
    protected $table = "SECCIONES";
    protected $primaryKey = 'IDSECCION';
    protected $guarded = [''];
    public $timestamps=false;

    public function alumnos(){
        return $this->hasMany(Alumno::class,'IDSECCION','IDSECCION');
    }
}
