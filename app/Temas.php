<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temas extends Model
{
    protected $table = 'temas_estudio';
    protected $primaryKey = 'codtema';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = ['codasignatura','codunidad','codtema','desctema','numtema','comentema','esttema'];
}
