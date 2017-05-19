<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    protected $table = "programas";

    protected $fillable = [
    'nombre',
    'duracion_meses',
    'duracion_horas',
    'duracion_practicas_horas',
    'objetivo_programa',
    'requisitos_ingreso',
    'trabajo_egresados',
    'escuela_id'
    ];
}