<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table = "estudiantes";

    protected $fillable = [
        'blanco_mujeres',
        'blanco_hombres',
        'caucasico_mujeres',
        'caucasico_hombres',
        'afrodescendiente_mujeres',
        'afrodescendiente_hombres',
        'indigena_mujeres',
        'indigena_hombres',
        'mestizo_mujeres',
        'mestizo_hombres',
        'raizal_isleno_mujeres',
        'raizal_isleno_hombres',
        'rom_gitano_mujeres',
        'rom_gitano_hombres',
        'criollo_mujeres',
        'criollo_hombres',
        'amerindio_mujeres',
        'amerindio_hombres',
        'polinesio_mujeres',
        'polinesio_hombres',
        'melanesio_mujeres',
        'melanesio_hombres',
        'asiatico_mujeres',
        'asiatico_hombres',
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
