<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table = "estudiantes";

    protected $fillable = [
    	'etnia_mujeres',
        'etnia_hombres',
        'victimas_mujeres',
        'victimas_hombres',
        'excombatientes_mujeres',
        'excombatientes_hombres',
        'desplazados_mujeres',
        'desplazados_hombres',
        'pobreza_mujeres',
        'pobreza_hombres',
        'certificados_mujeres',
        'certificados_hombres',
        'total_mujeres',
        'total_hombres',
    	'programa_id',
        'user_id',
    	];
}
