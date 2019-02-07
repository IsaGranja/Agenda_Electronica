<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = 'ciudades';
    protected $primaryKey = 'codciudad';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = ['codprovincia','codciudad','descciudad'];
}
