<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    //
    protected $primaryKey = 'IDMATRICULA';
    protected $table = 'MATRICULAS';
    protected $guarded = [''];

    public function alumno()
    {
        return $this->belongsTo('App\Alumno', 'IDALUMNO', 'IDALUMNO');
    }

    public function grado()
    {
        return $this->belongsTo('App\Grado', 'IDGRADO', 'IDGRADO');
    }

    public function nivel()
    {
        return $this->belongsTo('App\Nivel', 'IDNIVEL', 'IDNIVEL');
    }
}
