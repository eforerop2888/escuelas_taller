<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table = "estudiantes";

    protected $fillable = [
    	'etnia',
    	'victimas',
    	'excombatientes',
    	'desplazados',
    	'pobreza',
    	'certificados',
    	'genero_id',
    	'programa_id',
        'user_id',
    	];
}
