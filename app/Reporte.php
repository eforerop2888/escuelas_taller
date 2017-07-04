<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    protected $table = "reportes";

    protected $fillable = [
	    'nombre_archivo',
	    'ruta',
	    'estado'
    ];
}
