<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CursoExtension extends Model
{
    protected $table = "cursos_extension";

    protected $fillable = [
    	'nombre',
    	'objetivo',
    	'duracion',
    	'costo',
    	'contacto',
    ];
}
