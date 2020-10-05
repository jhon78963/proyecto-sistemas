<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catedra extends Model
{
    protected $table = "catedras";
    protected $primaryKey = 'IDCATEDRA';
    protected $guarded = [''];
    public $timestamps=false;

    public function docente(){
        return $this->hasOne('App\Docente','IDDOCENTE','IDDOCENTE');
    }
    
    public function cursos(){
        return $this->hasOne('App\Curso','IDCURSO','IDCURSO');
    }

    public function seccion(){
        return $this->hasOne('App\Seccion','IDSECCION','IDSECCION');
    }
}

