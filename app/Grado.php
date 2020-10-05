<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    //
    protected $table = "GRADOS";
    protected $primaryKey = 'IDGRADO';
    protected $guarded = [''];
    public $timestamps=false;

    public function cursos(){
        return $this->hasMany(Curso::class,'IDGRADO','IDGRADO');
    }

    public function alumnos(){
        return $this->hasMany(Alumno::class,'IDGRADO','IDGRADO');
    }
}
