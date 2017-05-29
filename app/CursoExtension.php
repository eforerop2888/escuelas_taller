<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CursoExtension extends Model
{
    protected $table = "cursos_extension";

    protected $fillable = [
    	'nombre',
    	'objetivo_curso',
    	'duracion',
    	'costo',
    	'temas',
    	'escuela_id',
    	'user_id',
    ];
}
