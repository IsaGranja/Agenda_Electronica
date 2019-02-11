<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escuelas extends Model
{
    protected $table = 'escuelas';
    protected $primaryKey = 'codescuela';
    public $timestamps = false;
    public $incrementing = false;
    
    protected $fillable = ['codfacultad','codescuela','descescuela','directorescuela'];
}
