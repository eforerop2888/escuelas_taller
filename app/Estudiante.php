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
        'cabeza_mujeres',
        'cabeza_hombres',
        'certificados_mujeres',
        'certificados_hombres',
        'egresados_programa_hombres',
        'egresados_programa_mujeres',
        'egresados_trabajo_hombres',
        'egresados_trabajo_mujeres',
        'egresados_trabajo_otro_hombres',
        'egresados_trabajo_otro_mujeres',
        'egresados_desempleados_hombres',
        'egresados_desempleados_mujeres',
        'total_mujeres',
        'total_hombres',
        'causas_desercion',
        'observaciones',
    	'programa_id',
        'user_id',
    	];
}
