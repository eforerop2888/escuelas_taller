<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    protected $table = 'modulos';

    protected $fillable = [
    	'nombre',
    	'duracion',
    	'tipo_modulo',
    	'objetivo',
    	'nombre_maestro',
    	'mail_maestro',
    	'experiencia',
    	'user_id',
    	'programa_id',
    ];
}
