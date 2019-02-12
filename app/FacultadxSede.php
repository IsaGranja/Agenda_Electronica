<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacultadxSede extends Model
{
    protected $table = 'facultadesxsedes';
    protected $primaryKey = 'codfacultad';
    public $timestamps = false;
    public $incrementing = false;
    
    protected $fillable = ['codsede','codfacultad'];
}
