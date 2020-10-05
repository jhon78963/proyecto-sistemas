<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    //
    protected $table = "NIVELES";
    protected $primaryKey = 'IDNIVEL';
    protected $guarded = [''];
    public $timestamps=false;

    public function grados()
    {
        return $this->hasMany('App\Grado','IDNIVEL','IDNIVEL');
    }

    public function cursos(){
        return $this->hasMany(Curso::class,'IDNIVEL','IDNIVEL');
    }

    public function alumnos(){
        return $this->hasMany(Alumno::class,'IDNIVEL','IDNIVEL');
    }
}
