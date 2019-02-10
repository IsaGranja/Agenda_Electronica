<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carreras extends Model
{
    protected $table = 'carreras';
    protected $primaryKey = 'codcarrera';
    public $timestamps = false;
    public $incrementing = false;
    
    protected $fillable = ['codescuela','codcarrera','desccarrera','nivcarrera','direccarrera'];
}
