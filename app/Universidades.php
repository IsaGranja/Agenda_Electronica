<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Universidades extends Model
{
    protected $table = 'universidades';
    protected $primaryKey = 'coduniversidad';
    public $timestamps = false;
    protected $fillable = ['coduniversidad','descuniversidad','categuniversidad','dir1universidad','dir2universidad',
    'numdiruniversidad','tipouniversidad','rectuniversidad','viserecuniviersidad','secregenuniversidad','rucuniversidad'];
    public $incrementing = false;
}
