<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodos extends Model
{
    protected $table = 'periodos';
    protected $primaryKey = 'codperiodo';
    public $timestamps = false;
    protected $fillable = ['codperiodo','codsede','fecinicioperiodo','fecfinalperiodo','estperiodo'];
    public $incrementing = false;
    
    
    
}
