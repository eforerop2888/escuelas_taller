<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escuela extends Model
{
    protected $table = 'escuelas';
    protected $fillable = ['nombre',
     						'direccion',
     						'telefono',
    						'director',
    						'director_email',
    						'coordinador',
    						'coordinador_email',
    						'coordinador_humano',
    						'coordinador_humano_email',
    						'acto_administrativo',
                            'pais_id',
                            'user_id'];
}
