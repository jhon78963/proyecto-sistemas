<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $primaryKey = 'IDDOCENTE';
    protected $table = 'DOCENTES';
    protected $guarded = [''];
}

