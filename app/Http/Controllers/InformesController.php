<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pais;
use App\User;
use App\Escuela;
use App\Programa;
use App\Estudiante;
use Charts;
use Illuminate\Support\Facades\DB;

class InformesController extends Controller
{
    public function index()
    {
    	$escuelas = Escuela::join('paises', 'escuelas.pais_id', '=', 'paises.id')
    		->get();
    	$chartEscuelas = Charts::database($escuelas, 'bar', 'highcharts')
    		->title('Escuelas por país')
		    ->elementLabel("Total")
		    ->dimensions(500, 250)
		    ->responsive(false)
		    ->groupBy('pais');
		$programas = Programa::join('escuelas', 'programas.escuela_id', '=', 'escuelas.id')
			->join('paises', 'escuelas.pais_id', '=', 'paises.id')
			->get();
		$chartProgramas = Charts::database($programas, 'bar', 'highcharts')
    		->title('Programas por país')
		    ->elementLabel("Total")
		    ->dimensions(500, 250)
		    ->responsive(false)
		    ->groupBy('pais');
		$poblacion_mujer = Estudiante::select(DB::raw('SUM(etnia) as etnia'),
			DB::raw('SUM(victimas) as victimas'),
			DB::raw('SUM(excombatientes) as excombatientes'),
			DB::raw('SUM(desplazados) as desplazados'),
			DB::raw('SUM(pobreza) as pobreza'),
			DB::raw('SUM(certificados) as certificados'))
			->where('genero_id', 1)
            ->first();
        $poblacion_hombre = Estudiante::select(DB::raw('SUM(etnia) as etnia'),
        	DB::raw('SUM(victimas) as victimas'),
			DB::raw('SUM(excombatientes) as excombatientes'),
			DB::raw('SUM(desplazados) as desplazados'),
			DB::raw('SUM(pobreza) as pobreza'),
			DB::raw('SUM(certificados) as certificados'))
			->where('genero_id', 2)
            ->first();
		$chartPoblaciones = Charts::multi('bar', 'material')
			->title("Tipos de población")
            ->dimensions(0, 400)
            ->template("material")
    		->dataset('Hombre', [$poblacion_hombre->etnia,
    		 	$poblacion_hombre->victimas,
    		 	$poblacion_hombre->excombatientes,
    		 	$poblacion_hombre->desplazados,
    		 	$poblacion_hombre->pobreza,
    		 	$poblacion_hombre->certificados])
    		->dataset('Mujer', [$poblacion_mujer->etnia,
    		 	$poblacion_mujer->victimas,
    		 	$poblacion_mujer->excombatientes,
    		 	$poblacion_mujer->desplazados,
    		 	$poblacion_mujer->pobreza,
    		 	$poblacion_mujer->certificados])
    		->labels(['Etnia', 'Victimas', 'Excombatientes', 'Desplazados', 'Pobreza',
    				'certificados']);
    	$paises = Pais::all();
    	return view('informes', ['paises' => $paises, 'chartEscuelas' => $chartEscuelas,
    		'chartProgramas' => $chartProgramas, 'chartPoblaciones' => $chartPoblaciones]);
    }
}
