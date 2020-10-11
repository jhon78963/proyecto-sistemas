<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $primaryKey = 'IDCURSO';
    protected $table = "CURSOS";
    protected $guarded = [''];
    public $timestamps=false;

    public function nivel() {
        return $this->belongsTo('App\Nivel','IDNIVEL','IDNIVEL');
    }

    public function grado() {
        return $this->belongsTo('App\Grado','IDGRADO','IDGRADO');
    }
}
