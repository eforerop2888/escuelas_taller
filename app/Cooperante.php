<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cooperante extends Model
{
    protected $table = 'cooperantes';

    protected $fillable = [
    	'nombre',
    	'mail_contacto',
    	'persona_contacto',
    	'tipo_cooperacion',
    	'resultados_significativos',
    	'programa_id'
    ];
}
