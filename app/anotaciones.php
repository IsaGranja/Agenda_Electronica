<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class anotaciones extends Model
{
	protected $primaryKey = null;
    public $timestamps = false;
	protected $table = 'anotaciones_estudiante';
	protected $fillable = array('cedestudiante','codcontenido','anotestudiante','imgestudiante');
}
