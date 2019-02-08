<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    
        protected $table = 'profesores';
        protected $primaryKey = 'cedprofesor';
        public $timestamps = false;
        protected $fillable = ['codcarrera','cedprofesor','nomprofesor','apeprofesor','correprofesor','celuprofesor'];
}
