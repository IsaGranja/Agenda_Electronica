<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Glosarios extends Model
{
    protected $table = 'glosarios';
    public $timestamps = false;
    protected $primaryKey = 'codglosario';
    protected $fillable = array('codglosario','codcontenido','palabraglosario','defglosario');
}
