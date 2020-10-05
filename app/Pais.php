<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $primaryKey = 'IDPAIS';
    protected $table = 'PAISES';
    protected $guarded = [''];
}
