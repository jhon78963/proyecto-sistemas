<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Alumno;

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
}
