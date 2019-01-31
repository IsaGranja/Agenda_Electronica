<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    protected $table = 'provincias';
    protected $primaryKey = 'codprovincia';
    public $timestamps = false;
    protected $fillable = ['codprovincia','desprovincia'];
}   
