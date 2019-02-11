<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    protected $table = 'facultades';
    protected $primaryKey = 'codfacultad';
    public $timestamps = false;
    public $incrementing = false;
    
    protected $fillable = ['codfacultad','descfacultad','decafacultad','subdecfacultad','secreabogfacultad'];
}
