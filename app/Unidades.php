<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidades extends Model
{
    protected $table = 'unidades_estudio';
    protected $primaryKey = 'codunidad';
    public $timestamps = false;
    protected $fillable = ['codasignatura','codunidad','descunidad','numunidad'];
}
