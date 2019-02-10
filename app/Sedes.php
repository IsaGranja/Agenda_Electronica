<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sedes extends Model
{
    protected $table = 'sedes';
    protected $primaryKey = 'codsede';
    public $timestamps = false;
    protected $fillable = ['coduniversidad','codciudad','codsede','descsede','prerectsede','secregensede'];
    public $incrementing = false;
}
