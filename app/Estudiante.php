<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table = 'estudiantes';
    protected $primaryKey = 'cedestudiante';
    public $timestamps = false;
    protected $fillable = ['codcarrera','cedestudiante','nomestudiante','apeestudiante','correestudiante'];
}

