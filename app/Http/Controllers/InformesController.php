<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pais;
use App\User;
use App\Escuela;
use App\Programa;
use App\Estudiante;
use Charts;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class InformesController extends Controller
{
    public function index()
    {
    	/*
		* Chart escuela por país
    	*/
    	$escuelas = Escuela::join('paises', 'escuelas.pais_id', '=', 'paises.id')
    		->get();
    	$chartEscuelas = Charts::database($escuelas, 'bar', 'highcharts')
    		->title('Escuelas por país')
		    ->elementLabel("Total")
		    ->dimensions(500, 250)
		    ->responsive(false)
		    ->groupBy('pais');
		/*
		* Chart programas por país
    	*/
		$programas = Programa::join('escuelas', 'programas.escuela_id', '=', 'escuelas.id')
			->join('paises', 'escuelas.pais_id', '=', 'paises.id')
			->get();
		$chartProgramas = Charts::database($programas, 'bar', 'highcharts')
    		->title('Programas por país')
		    ->elementLabel("Total")
		    ->dimensions(500, 250)
		    ->responsive(false)
		    ->groupBy('pais');
		/*
		* Chart Tipo de poblacion
		*/
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
            ->responsive(false)
    		->dataset('Hombre', [$poblacion_hombre->etnia,
    		 	$poblacion_hombre->victimas,
    		 	$poblacion_hombre->excombatientes,
    		 	$poblacion_hombre->desplazados,
    		 	$poblacion_hombre->pobreza])
    		->dataset('Mujer', [$poblacion_mujer->etnia,
    		 	$poblacion_mujer->victimas,
    		 	$poblacion_mujer->excombatientes,
    		 	$poblacion_mujer->desplazados,
    		 	$poblacion_mujer->pobreza,])
    		->labels(['Etnia', 'Victimas', 'Excombatientes', 'Desplazados', 'Pobreza']);
    	/*
    	* Chart Población Atendida
    	*/
    	$añosPoblacionMujera = Estudiante::select(DB::raw('SUM(etnia) + SUM(victimas) + SUM(excombatientes) + SUM(desplazados) + SUM(pobreza) as sumaTotal'))
    		->whereYear('created_at', Carbon::now()->year)
    		->where('genero_id', 1)
    		->first();
    	$añosPoblacionHombrea = Estudiante::select(DB::raw('SUM(etnia) + SUM(victimas) + SUM(excombatientes) + SUM(desplazados) + SUM(pobreza) as sumaTotal'))
    		->whereYear('created_at', Carbon::now()->year)
    		->where('genero_id', 2)
    		->first();
    	$añosPoblacionMujera1 = Estudiante::select(DB::raw('SUM(etnia) + SUM(victimas) + SUM(excombatientes) + SUM(desplazados) + SUM(pobreza) as sumaTotal'))
    		->whereYear('created_at', Carbon::now()->year - 1)
    		->where('genero_id', 1)
    		->first();
    	$añosPoblacionHombrea1 = Estudiante::select(DB::raw('SUM(etnia) + SUM(victimas) + SUM(excombatientes) + SUM(desplazados) + SUM(pobreza) as sumaTotal'))
    		->whereYear('created_at', Carbon::now()->year - 1)
    		->where('genero_id', 2)
    		->first();
    	$añosPoblacionMujera2 = Estudiante::select(DB::raw('SUM(etnia) + SUM(victimas) + SUM(excombatientes) + SUM(desplazados) + SUM(pobreza) as sumaTotal'))
    		->whereYear('created_at', Carbon::now()->year - 2)
    		->where('genero_id', 1)
    		->first();
    	$añosPoblacionHombrea2 = Estudiante::select(DB::raw('SUM(etnia) + SUM(victimas) + SUM(excombatientes) + SUM(desplazados) + SUM(pobreza) as sumaTotal'))
    		->whereYear('created_at', Carbon::now()->year - 2)
    		->where('genero_id', 2)
    		->first();
    	$chartAnos = Charts::multi('bar', 'material')
			->title("Poblacion Atendida")
            ->dimensions(0, 400)
            ->template("material")
            ->responsive(false)
    		->dataset('Hombre', [$añosPoblacionHombrea2->sumaTotal,
    			$añosPoblacionHombrea1->sumaTotal,
    			$añosPoblacionHombrea->sumaTotal])
    		->dataset('Mujer', [$añosPoblacionMujera2->sumaTotal,
    			$añosPoblacionMujera1->sumaTotal,
    			$añosPoblacionMujera->sumaTotal])
    		->labels([Carbon::now()->year - 2, Carbon::now()->year - 1, Carbon::now()->year]);

	    $paises = Pais::all();
    	return view('informes', ['paises' => $paises,
    	 	'chartEscuelas' => $chartEscuelas,
    		'chartProgramas' => $chartProgramas,
    		'chartPoblaciones' => $chartPoblaciones,
    		'chartAnos' => $chartAnos]);
    }

    public function listaEscuelas(Request $request){    
        $escuelas = Escuela::where('pais_id', $request->pais)
            ->get();
        echo $escuelas;
    }

    public function generarInforme(Request $request){
        switch ($request->tipo_informe) {
            case 1:
               
                break;
            case 2:
                echo "i es igual a 1";
                break;
            case 3:
                $estudiantes_mujeres = Estudiante::where('programa_id', $request->escuela)
                    ->where('genero_id', 1)
                    ->first();
                $estudiantes_hombres = Estudiante::where('programa_id', $request->escuela)
                    ->where('genero_id', 2)
                    ->first();
                $estudiantes_mujeres_t = Estudiante::where('programa_id', $request->escuela)
                    ->select(DB::raw('SUM(etnia) + SUM(victimas) + SUM(excombatientes) + SUM(desplazados) + SUM(pobreza) as sumaTotal'))
                    ->where('genero_id', 1)
                    ->first();
                $estudiantes_hombres_t = Estudiante::where('programa_id', $request->escuela)
                    ->select(DB::raw('SUM(etnia) + SUM(victimas) + SUM(excombatientes) + SUM(desplazados) + SUM(pobreza) as sumaTotal'))
                    ->where('genero_id', 2)
                    ->first();
                return view('informeEspecifico', 
                    ['estudiantes_mujeres' => $estudiantes_mujeres,
                    'estudiantes_hombres' => $estudiantes_hombres,
                    'estudiantes_mujeres_t' => $estudiantes_mujeres_t,
                    'estudiantes_hombres_t' => $estudiantes_hombres_t]);
                break;
            case 4:
                $programas = Programa::join('escuelas','programas.escuela_id','=','escuelas.id')
                    ->join('paises','escuelas.pais_id','=','paises.id')
                    ->select('programas.id as id',
                    'programas.nombre as nombre',
                    'programas.duracion_meses',
                    'programas.duracion_horas',
                    'programas.duracion_practicas_horas',
                    'escuelas.nombre as nombre_escuela',
                    'paises.pais')
                    ->where('escuela_id', $request->escuela)
                    ->get();
                return view('informeEspecifico', ['programas' => $programas]);
                break;
        }
        
    }
}
