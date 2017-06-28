<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Auth;
use Illuminate\Http\Request;
use App\Pais;
use App\User;
use App\Escuela;
use App\Programa;
use App\Estudiante;
use App\Cooperante;
use App\CursoExtension;
use Charts;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\RequestGenerateInform;

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
		$poblacion = Estudiante::select(
            DB::raw('SUM(blanco_mujeres) as blanco_mujeres'),
            DB::raw('SUM(blanco_hombres) as blanco_hombres'),
            DB::raw('SUM(caucasico_mujeres) as caucasico_mujeres'),
            DB::raw('SUM(caucasico_hombres) as caucasico_hombres'),
            DB::raw('SUM(afrodescendiente_mujeres) as afrodescendiente_mujeres'),
            DB::raw('SUM(afrodescendiente_hombres) as afrodescendiente_hombres'),
            DB::raw('SUM(indigena_mujeres) as indigena_mujeres'),
            DB::raw('SUM(indigena_hombres) as indigena_hombres'),
            DB::raw('SUM(mestizo_mujeres) as mestizo_mujeres'),
            DB::raw('SUM(mestizo_hombres) as mestizo_hombres'),
            DB::raw('SUM(raizal_isleno_mujeres) as raizal_isleno_mujeres'),
            DB::raw('SUM(raizal_isleno_hombres) as raizal_isleno_hombres'),
            DB::raw('SUM(rom_gitano_mujeres) as rom_gitano_mujeres'),
            DB::raw('SUM(rom_gitano_hombres) as rom_gitano_hombres'),
            DB::raw('SUM(criollo_mujeres) as criollo_mujeres'),
            DB::raw('SUM(criollo_hombres) as criollo_hombres'),
            DB::raw('SUM(amerindio_mujeres) as amerindio_mujeres'),
            DB::raw('SUM(amerindio_hombres) as amerindio_hombres'),
            DB::raw('SUM(polinesio_mujeres) as polinesio_mujeres'),
            DB::raw('SUM(polinesio_hombres) as polinesio_hombres'),
            DB::raw('SUM(melanesio_mujeres) as melanesio_mujeres'),
            DB::raw('SUM(melanesio_hombres) as melanesio_hombres'),
            DB::raw('SUM(asiatico_mujeres) as asiatico_mujeres'),
            DB::raw('SUM(asiatico_hombres) as asiatico_hombres'),
			DB::raw('SUM(victimas_mujeres) as victimas_mujeres'),
			DB::raw('SUM(excombatientes_mujeres) as excombatientes_mujeres'),
			DB::raw('SUM(desplazados_mujeres) as desplazados_mujeres'),
			DB::raw('SUM(pobreza_mujeres) as pobreza_mujeres'),
            DB::raw('SUM(cabeza_mujeres) as cabeza_mujeres'),
			DB::raw('SUM(certificados_mujeres) as certificados_mujeres'),
            DB::raw('SUM(victimas_hombres) as victimas_hombres'),
            DB::raw('SUM(excombatientes_hombres) as excombatientes_hombres'),
            DB::raw('SUM(desplazados_hombres) as desplazados_hombres'),
            DB::raw('SUM(pobreza_hombres) as pobreza_hombres'),
            DB::raw('SUM(cabeza_hombres) as cabeza_hombres'),
            DB::raw('SUM(certificados_hombres) as certificados_hombres'))
            ->first();
		$chartPoblaciones = Charts::multi('bar', 'material')
			->title("Tipos de población")
            ->dimensions(0, 400)
            ->template("material")
            ->responsive(false)
    		->dataset('Hombre', [
                $poblacion->blanco_hombres,
                $poblacion->caucasico_hombres,
                $poblacion->afrodescendiente_hombres,
                $poblacion->indigena_hombres,
                $poblacion->mestizo_hombres,
                $poblacion->raizal_isleno_hombres,
                $poblacion->rom_gitano_hombres,
                $poblacion->criollo_hombres,
                $poblacion->amerindio_hombres,
                $poblacion->polinesio_hombres,
                $poblacion->melanesio_hombres,
                $poblacion->asiatico_hombres,
    		 	$poblacion->victimas_hombres,
    		 	$poblacion->excombatientes_hombres,
    		 	$poblacion->desplazados_hombres,
    		 	$poblacion->pobreza_hombres,
                $poblacion->cabeza_hombres,])
    		->dataset('Mujer', [
                $poblacion->blanco_mujeres,
                $poblacion->caucasico_mujeres,
                $poblacion->afrodescendiente_mujeres,
                $poblacion->indigena_mujeres,
                $poblacion->mestizo_mujeres,
                $poblacion->raizal_isleno_mujeres,
                $poblacion->rom_gitano_mujeres,
                $poblacion->criollo_mujeres,
                $poblacion->amerindio_mujeres,
                $poblacion->polinesio_mujeres,
                $poblacion->melanesio_mujeres,
                $poblacion->asiatico_mujeres,
    		 	$poblacion->victimas_mujeres,
    		 	$poblacion->excombatientes_mujeres,
    		 	$poblacion->desplazados_mujeres,
    		 	$poblacion->pobreza_mujeres,
                $poblacion->cabeza_mujeres,])
    		->labels(['Blancos','Caucásicos','Afrodescendientes','Indígenas','Mestizos','Raizal (isleño)','Rom (Gitano)','Criollos','Amerindios','Polinesios','Melanesios','Asiáticos', 'Victimas', 'Excombatientes', 'Desplazados', 'Pobreza', 'Cabeza de familia']);
    	/*
    	* Chart Población Atendida
    	*/
    	$añosPoblacionMujera = Estudiante::select(DB::raw('SUM(blanco_mujeres) + SUM(afrodescendiente_mujeres) + SUM(caucasico_mujeres) + SUM(indigena_mujeres) + SUM(mestizo_mujeres) + SUM(raizal_isleno_mujeres) + SUM(rom_gitano_mujeres) + SUM(criollo_mujeres) + SUM(amerindio_mujeres) + SUM(polinesio_mujeres) + SUM(melanesio_mujeres) + SUM(asiatico_mujeres) + SUM(victimas_mujeres) + SUM(excombatientes_mujeres) + SUM(desplazados_mujeres) + SUM(pobreza_mujeres) + SUM(cabeza_mujeres) as sumaTotal'))
    		->whereYear('created_at', Carbon::now()->year)
    		->first();
    	$añosPoblacionHombrea = Estudiante::select(DB::raw('SUM(blanco_hombres) + SUM(afrodescendiente_hombres) + SUM(caucasico_hombres) + SUM(indigena_hombres) + SUM(mestizo_hombres) + SUM(raizal_isleno_hombres) + SUM(rom_gitano_hombres) + SUM(criollo_hombres) + SUM(amerindio_hombres) + SUM(polinesio_hombres) + SUM(melanesio_hombres) + SUM(asiatico_hombres) + SUM(victimas_hombres) + SUM(excombatientes_hombres) + SUM(desplazados_hombres) + SUM(pobreza_hombres) + SUM(cabeza_hombres) as sumaTotal'))
    		->whereYear('created_at', Carbon::now()->year)
    		->first();
    	$añosPoblacionMujera1 = Estudiante::select(DB::raw('SUM(blanco_mujeres) + SUM(afrodescendiente_mujeres) + SUM(caucasico_mujeres) + SUM(indigena_mujeres) + SUM(mestizo_mujeres) + SUM(raizal_isleno_mujeres) + SUM(rom_gitano_mujeres) + SUM(criollo_mujeres) + SUM(amerindio_mujeres) + SUM(polinesio_mujeres) + SUM(melanesio_mujeres) + SUM(asiatico_mujeres) + SUM(victimas_mujeres) + SUM(excombatientes_mujeres) + SUM(desplazados_mujeres) + SUM(pobreza_mujeres) + SUM(cabeza_mujeres) as sumaTotal'))
    		->whereYear('created_at', Carbon::now()->year - 1)
    		->first();
    	$añosPoblacionHombrea1 = Estudiante::select(DB::raw('SUM(blanco_hombres) + SUM(afrodescendiente_hombres) + SUM(caucasico_hombres) + SUM(indigena_hombres) + SUM(mestizo_hombres) + SUM(raizal_isleno_hombres) + SUM(rom_gitano_hombres) + SUM(criollo_hombres) + SUM(amerindio_hombres) + SUM(polinesio_hombres) + SUM(melanesio_hombres) + SUM(asiatico_hombres) + SUM(victimas_hombres) + SUM(excombatientes_hombres) + SUM(desplazados_hombres) + SUM(pobreza_hombres) + SUM(cabeza_hombres) as sumaTotal'))
    		->whereYear('created_at', Carbon::now()->year - 1)
    		->first();
    	$añosPoblacionMujera2 = Estudiante::select(DB::raw('SUM(blanco_mujeres) + SUM(afrodescendiente_mujeres) + SUM(caucasico_mujeres) + SUM(indigena_mujeres) + SUM(mestizo_mujeres) + SUM(raizal_isleno_mujeres) + SUM(rom_gitano_mujeres) + SUM(criollo_mujeres) + SUM(amerindio_mujeres) + SUM(polinesio_mujeres) + SUM(melanesio_mujeres) + SUM(asiatico_mujeres) + SUM(victimas_mujeres) + SUM(excombatientes_mujeres) + SUM(desplazados_mujeres) + SUM(pobreza_mujeres)  + SUM(cabeza_mujeres) as sumaTotal'))
    		->whereYear('created_at', Carbon::now()->year - 2)
    		->first();
    	$añosPoblacionHombrea2 = Estudiante::select(DB::raw('SUM(blanco_hombres) + SUM(afrodescendiente_hombres) + SUM(caucasico_hombres) + SUM(indigena_hombres) + SUM(mestizo_hombres) + SUM(raizal_isleno_hombres) + SUM(rom_gitano_hombres) + SUM(criollo_hombres) + SUM(amerindio_hombres) + SUM(polinesio_hombres) + SUM(melanesio_hombres) + SUM(asiatico_hombres) + SUM(victimas_hombres) + SUM(excombatientes_hombres) + SUM(desplazados_hombres) + SUM(pobreza_hombres)  + SUM(cabeza_hombres) as sumaTotal'))
    		->whereYear('created_at', Carbon::now()->year - 2)
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

    public function generarInforme(RequestGenerateInform $request){
        switch ($request->tipo_informe) {
            case 1:
                $cooperantes = $this->reporteCooperantes($request);
                return view('informes.informeEspecificoCooperantes', ['cooperantes' => $cooperantes, 'escuela' => $request->escuela]);
                break;
            case 2:
                $cursos = $this->reporteCursos($request);
                return view('informes.informeEspecificoCursos', 
                    ['cursos' => $cursos, 'escuela' => $request->escuela]);
                break;
            case 3:
                $estudiantes = $this->reporteEstudiantes($request);
                return view('informes.informeEspecificoEstudiantes', 
                    ['estudiantes' => $estudiantes, 'pais' => $request->pais]);
                break;
            case 4:
                $programas = $this->reporteProgramas($request);
                return view('informes.informeEspecificoProgramas', ['programas' => $programas, 'escuela' => $request->escuela]);
                break;
        }
        
    }

    public function showExcel(Request $request){
        switch ($request->tipo_informe) {
            case 1:
                $cooperantes = $this->reporteCooperantes($request);
                $infoExcel = []; 
                $infoExcel[] = ['#',
                    'Nombre',
                    'Persona Contacto',
                    'Mail del contacto',
                    'Tipo de Cooperación',
                    'Resultados Significativos', 
                    'Programa',
                    'País'];
                $this->ejecutarExcel('Cooperantes', $infoExcel, $cooperantes);
                break;
            case 2:
                $cursos = $this->reporteCursos($request);
                $infoExcel = []; 
                $infoExcel[] = [
                    '#',
                    'Nombre',
                    'Duración',
                    'Costo',
                    'Temas',
                    'Escuela',
                    ];
                $this->ejecutarExcel('Cursos Extension', $infoExcel, $cursos);
                break;
            case 3:
                $estudiantes = $this->reporteEstudiantes($request);
                $infoExcel = []; 
                $infoExcel[] = [
                    'Escuela',
                    'Mujeres Blancas',
                    'Hombres Blancos',
                    'Mujeres Caucásicas',
                    'Hombres Caucásicos',
                    'Mujeres Afrodescendientas',
                    'Hombres Afrodescendientes',
                    'Mujeres Indígenas',
                    'Hombres Indígenas',
                    'Mujeres Mestizas',
                    'Hombres Mestizos',
                    'Mujeres Raizal (isleña)',
                    'Hombres Raizal (isleño)',
                    'Mujeres Rom (Gitana)',
                    'Hombres Rom (Gitano)',
                    'Mujeres Criollas',
                    'Hombres Criollos',
                    'Mujeres Amerindias',
                    'Hombres Amerindios',
                    'Mujeres Polinesias',
                    'Hombres Polinesios',
                    'Mujeres Melanesias',
                    'Hombres Melanesios',
                    'Mujeres Asiáticas',
                    'Hombres Asiáticos',
                    'Victimas Hombres',
                    'Victimas Mujeres',
                    'Hombres Excombatientes',
                    'Mujeres Excombatientes',
                    'Hombres Desplazados',
                    'Mujeres Desplazadas',
                    'Pobreza Hombres',
                    'Pobreza Mujeres',
                    'Hombres Certificados',
                    'Mujeres Certificadas',
                    'Total Hombres',
                    'Total Mujeres'
                    ];
                $this->ejecutarExcel('Programas', $infoExcel, $estudiantes);
                break;
            case 4:
                $programas = $this->reporteProgramas($request);
                $infoExcel = []; 
                $infoExcel[] = ['#',
                    'Nombre',
                    'Duración (meses)',
                    'Duración (horas)',
                    'Duración Practicas (horas)',
                    'Objetivo', 
                    'Requisitos Ingreso', 
                    'Trabajo Egresados',
                    'Escuela',
                    'Pais'];
                $this->ejecutarExcel('Programas', $infoExcel, $programas);
                break;
            
        }
    }

    private function reporteCooperantes(Request $request){
        $cooperantes = Cooperante::join('programas','cooperantes.programa_id','=','programas.id')
            ->join('users','programas.user_id','=','users.id')
            ->join('paises','users.pais_id','=','paises.id')
            ->join('escuelas','programas.escuela_id','=','escuelas.id')
            ->select('cooperantes.id as id',
            'cooperantes.nombre as nombre',
            'persona_contacto',
            'mail_contacto',
            'tipo_cooperacion',
            'resultados_significativos',
            'programas.nombre as nombre_programa',
            'paises.pais')
            ->where('escuelas.id', $request->escuela)
            ->get();
        return $cooperantes;
    }

    private function reporteProgramas(Request $request){
        $programas = Programa::join('escuelas','programas.escuela_id','=','escuelas.id')
            ->join('paises','escuelas.pais_id','=','paises.id')
            ->select('programas.id as id',
            'programas.nombre as nombre',
            'programas.duracion_meses',
            'programas.duracion_horas',
            'programas.duracion_practicas_horas',
            'programas.objetivo_programa',
            'programas.requisitos_ingreso',
            'programas.trabajo_egresados',
            'escuelas.nombre as nombre_escuela',
            'paises.pais')
            ->where('escuela_id', $request->escuela)
            ->get();
        return $programas;
    }

    private function reporteEstudiantes(Request $request)
    {
        $estudiantes = Estudiante::join('programas','estudiantes.programa_id','=','programas.id')
                    ->join('escuelas','programas.escuela_id','=','escuelas.id')
                    ->join('paises','escuelas.pais_id','=','paises.id')
                    ->select('escuelas.nombre as nombre_escuela',
                        'estudiantes.blanco_mujeres',
                        'estudiantes.blanco_hombres',
                        'estudiantes.caucasico_mujeres',
                        'estudiantes.caucasico_hombres',
                        'estudiantes.afrodescendiente_mujeres',
                        'estudiantes.afrodescendiente_hombres',
                        'estudiantes.indigena_mujeres',
                        'estudiantes.indigena_hombres',
                        'estudiantes.mestizo_mujeres',
                        'estudiantes.mestizo_hombres',
                        'estudiantes.raizal_isleno_mujeres',
                        'estudiantes.raizal_isleno_hombres',
                        'estudiantes.rom_gitano_mujeres',
                        'estudiantes.rom_gitano_hombres',
                        'estudiantes.criollo_mujeres',
                        'estudiantes.criollo_hombres',
                        'estudiantes.amerindio_mujeres',
                        'estudiantes.amerindio_hombres',
                        'estudiantes.polinesio_mujeres',
                        'estudiantes.polinesio_hombres',
                        'estudiantes.melanesio_mujeres',
                        'estudiantes.melanesio_hombres',
                        'estudiantes.asiatico_mujeres',
                        'estudiantes.asiatico_hombres',
                        'estudiantes.victimas_hombres',
                        'estudiantes.victimas_mujeres',
                        'estudiantes.excombatientes_hombres',
                        'estudiantes.excombatientes_mujeres',
                        'estudiantes.desplazados_hombres',
                        'estudiantes.desplazados_mujeres',
                        'estudiantes.pobreza_hombres',
                        'estudiantes.pobreza_mujeres',
                        'estudiantes.certificados_hombres',
                        'estudiantes.certificados_mujeres',
                        'estudiantes.total_hombres',
                        'estudiantes.total_mujeres'
                        )
                    ->where('paises.id', $request->pais)
                    ->get();
        return $estudiantes;
    }

    private function reporteCursos(Request $request)
    {
        $cursosExtension = CursoExtension::join('escuelas','cursos_extension.escuela_id','=','escuelas.id')
            ->select('cursos_extension.id as id',
            'cursos_extension.nombre as nombre_curso',
            'duracion',
            'costo',
            'temas',
            'escuelas.nombre as nombre_escuela')
            ->get();
        return $cursosExtension;
    }

    private function ejecutarExcel($nombreInforme, array $infoExcel, $info){
        Excel::create($nombreInforme, 
            function($excel) use ($info, $nombreInforme, $infoExcel) {
            $excel->sheet($nombreInforme, function($sheet) use (
                $info, $infoExcel) {
                foreach($info as $rowinfo) 
                { 
                    $infoExcel[] = $rowinfo->toArray();
                }
                $sheet->fromArray($infoExcel, null, 'A1', false, false);
            });
        })->export('xls');
    }

    public function generarGraficos(Request $request){

        /*
        * Chart Tipo de poblacion
        */
        $poblacion = Estudiante::select(
            DB::raw('SUM(blanco_mujeres) as blanco_mujeres'),
            DB::raw('SUM(blanco_hombres) as blanco_hombres'),
            DB::raw('SUM(caucasico_mujeres) as caucasico_mujeres'),
            DB::raw('SUM(caucasico_hombres) as caucasico_hombres'),
            DB::raw('SUM(afrodescendiente_mujeres) as afrodescendiente_mujeres'),
            DB::raw('SUM(afrodescendiente_hombres) as afrodescendiente_hombres'),
            DB::raw('SUM(indigena_mujeres) as indigena_mujeres'),
            DB::raw('SUM(indigena_hombres) as indigena_hombres'),
            DB::raw('SUM(mestizo_mujeres) as mestizo_mujeres'),
            DB::raw('SUM(mestizo_hombres) as mestizo_hombres'),
            DB::raw('SUM(raizal_isleno_mujeres) as raizal_isleno_mujeres'),
            DB::raw('SUM(raizal_isleno_hombres) as raizal_isleno_hombres'),
            DB::raw('SUM(rom_gitano_mujeres) as rom_gitano_mujeres'),
            DB::raw('SUM(rom_gitano_hombres) as rom_gitano_hombres'),
            DB::raw('SUM(criollo_mujeres) as criollo_mujeres'),
            DB::raw('SUM(criollo_hombres) as criollo_hombres'),
            DB::raw('SUM(amerindio_mujeres) as amerindio_mujeres'),
            DB::raw('SUM(amerindio_hombres) as amerindio_hombres'),
            DB::raw('SUM(polinesio_mujeres) as polinesio_mujeres'),
            DB::raw('SUM(polinesio_hombres) as polinesio_hombres'),
            DB::raw('SUM(melanesio_mujeres) as melanesio_mujeres'),
            DB::raw('SUM(melanesio_hombres) as melanesio_hombres'),
            DB::raw('SUM(asiatico_mujeres) as asiatico_mujeres'),
            DB::raw('SUM(asiatico_hombres) as asiatico_hombres'),
            DB::raw('SUM(victimas_mujeres) as victimas_mujeres'),
            DB::raw('SUM(excombatientes_mujeres) as excombatientes_mujeres'),
            DB::raw('SUM(desplazados_mujeres) as desplazados_mujeres'),
            DB::raw('SUM(pobreza_mujeres) as pobreza_mujeres'),
            DB::raw('SUM(cabeza_mujeres) as cabeza_mujeres'),
            DB::raw('SUM(certificados_mujeres) as certificados_mujeres'),
            DB::raw('SUM(victimas_hombres) as victimas_hombres'),
            DB::raw('SUM(excombatientes_hombres) as excombatientes_hombres'),
            DB::raw('SUM(desplazados_hombres) as desplazados_hombres'),
            DB::raw('SUM(pobreza_hombres) as pobreza_hombres'),
            DB::raw('SUM(cabeza_hombres) as cabeza_hombres'),
            DB::raw('SUM(certificados_hombres) as certificados_hombres'))
            ->join('programas', 'estudiantes.programa_id', '=', 'programas.id')
            ->join('escuelas', 'programas.escuela_id', '=', 'escuelas.id')
            ->where('escuelas.pais_id', $request->pais)
            ->first();
        $chartPoblaciones = Charts::multi('bar', 'material')
            ->title("Tipos de población")
            ->dimensions(0, 400)
            ->template("material")
            ->responsive(false)
            ->dataset('Hombre', [
                $poblacion->blanco_hombres,
                $poblacion->caucasico_hombres,
                $poblacion->afrodescendiente_hombres,
                $poblacion->indigena_hombres,
                $poblacion->mestizo_hombres,
                $poblacion->raizal_isleno_hombres,
                $poblacion->rom_gitano_hombres,
                $poblacion->criollo_hombres,
                $poblacion->amerindio_hombres,
                $poblacion->polinesio_hombres,
                $poblacion->melanesio_hombres,
                $poblacion->asiatico_hombres,
                $poblacion->victimas_hombres,
                $poblacion->excombatientes_hombres,
                $poblacion->desplazados_hombres,
                $poblacion->pobreza_hombres,
                $poblacion->cabeza_hombres,])
            ->dataset('Mujer', [
                $poblacion->blanco_mujeres,
                $poblacion->caucasico_mujeres,
                $poblacion->afrodescendiente_mujeres,
                $poblacion->indigena_mujeres,
                $poblacion->mestizo_mujeres,
                $poblacion->raizal_isleno_mujeres,
                $poblacion->rom_gitano_mujeres,
                $poblacion->criollo_mujeres,
                $poblacion->amerindio_mujeres,
                $poblacion->polinesio_mujeres,
                $poblacion->melanesio_mujeres,
                $poblacion->asiatico_mujeres,
                $poblacion->victimas_mujeres,
                $poblacion->excombatientes_mujeres,
                $poblacion->desplazados_mujeres,
                $poblacion->pobreza_mujeres,
                $poblacion->cabeza_mujeres,])
            ->labels(['Blancos','Caucásicos','Afrodescendientes','Indígenas','Mestizos','Raizal (isleño)','Rom (Gitano)','Criollos','Amerindios','Polinesios','Melanesios','Asiáticos','Victimas', 'Excombatientes', 'Desplazados', 'Pobreza', 'Cabeza de familia']);
        /*
        * Chart Población Atendida
        */
        $añosPoblacionMujera = Estudiante::select(DB::raw('SUM(blanco_mujeres) + SUM(afrodescendiente_mujeres) + SUM(caucasico_mujeres) + SUM(indigena_mujeres) + SUM(mestizo_mujeres) + SUM(raizal_isleno_mujeres) + SUM(rom_gitano_mujeres) + SUM(criollo_mujeres) + SUM(amerindio_mujeres) + SUM(polinesio_mujeres) + SUM(melanesio_mujeres) + SUM(asiatico_mujeres) + SUM(victimas_mujeres) + SUM(excombatientes_mujeres) + SUM(desplazados_mujeres) + SUM(pobreza_mujeres) + SUM(cabeza_mujeres) as sumaTotal'))
            ->join('programas', 'estudiantes.programa_id', '=', 'programas.id')
            ->join('escuelas', 'programas.escuela_id', '=', 'escuelas.id')
            ->where('escuelas.pais_id', $request->pais)            
            ->whereYear('estudiantes.created_at', Carbon::now()->year)
            ->first();
        $añosPoblacionHombrea = Estudiante::select(DB::raw('SUM(blanco_hombres) + SUM(afrodescendiente_hombres) + SUM(caucasico_hombres) + SUM(indigena_hombres) + SUM(mestizo_hombres) + SUM(raizal_isleno_hombres) + SUM(rom_gitano_hombres) + SUM(criollo_hombres) + SUM(amerindio_hombres) + SUM(polinesio_hombres) + SUM(melanesio_hombres) + SUM(asiatico_hombres) + SUM(victimas_hombres) + SUM(excombatientes_hombres) + SUM(desplazados_hombres) + SUM(pobreza_hombres) + SUM(cabeza_hombres) as sumaTotal'))
            ->join('programas', 'estudiantes.programa_id', '=', 'programas.id')
            ->join('escuelas', 'programas.escuela_id', '=', 'escuelas.id')
            ->where('escuelas.pais_id', $request->pais)
            ->whereYear('estudiantes.created_at', Carbon::now()->year)
            ->first();
        $añosPoblacionMujera1 = Estudiante::select(DB::raw('SUM(blanco_mujeres) + SUM(afrodescendiente_mujeres) + SUM(caucasico_mujeres) + SUM(indigena_mujeres) + SUM(mestizo_mujeres) + SUM(raizal_isleno_mujeres) + SUM(rom_gitano_mujeres) + SUM(criollo_mujeres) + SUM(amerindio_mujeres) + SUM(polinesio_mujeres) + SUM(melanesio_mujeres) + SUM(asiatico_mujeres) + SUM(victimas_mujeres) + SUM(excombatientes_mujeres) + SUM(desplazados_mujeres) + SUM(pobreza_mujeres) + SUM(cabeza_mujeres) as sumaTotal'))
            ->join('programas', 'estudiantes.programa_id', '=', 'programas.id')
            ->join('escuelas', 'programas.escuela_id', '=', 'escuelas.id')
            ->where('escuelas.pais_id', $request->pais)
            ->whereYear('estudiantes.created_at', Carbon::now()->year - 1)
            ->first();
        $añosPoblacionHombrea1 = Estudiante::select(DB::raw('SUM(blanco_hombres) + SUM(afrodescendiente_hombres) + SUM(caucasico_hombres) + SUM(indigena_hombres) + SUM(mestizo_hombres) + SUM(raizal_isleno_hombres) + SUM(rom_gitano_hombres) + SUM(criollo_hombres) + SUM(amerindio_hombres) + SUM(polinesio_hombres) + SUM(melanesio_hombres) + SUM(asiatico_hombres) + SUM(victimas_hombres) + SUM(excombatientes_hombres) + SUM(desplazados_hombres) + SUM(pobreza_hombres) + SUM(cabeza_hombres) as sumaTotal'))
            ->join('programas', 'estudiantes.programa_id', '=', 'programas.id')
            ->join('escuelas', 'programas.escuela_id', '=', 'escuelas.id')
            ->where('escuelas.pais_id', $request->pais)
            ->whereYear('estudiantes.created_at', Carbon::now()->year - 1)
            ->first();
        $añosPoblacionMujera2 = Estudiante::select(DB::raw('SUM(blanco_mujeres) + SUM(afrodescendiente_mujeres) + SUM(caucasico_mujeres) + SUM(indigena_mujeres) + SUM(mestizo_mujeres) + SUM(raizal_isleno_mujeres) + SUM(rom_gitano_mujeres) + SUM(criollo_mujeres) + SUM(amerindio_mujeres) + SUM(polinesio_mujeres) + SUM(melanesio_mujeres) + SUM(asiatico_mujeres) + SUM(victimas_mujeres) + SUM(excombatientes_mujeres) + SUM(desplazados_mujeres) + SUM(pobreza_mujeres)  + SUM(cabeza_mujeres) as sumaTotal'))
            ->join('programas', 'estudiantes.programa_id', '=', 'programas.id')
            ->join('escuelas', 'programas.escuela_id', '=', 'escuelas.id')
            ->where('escuelas.pais_id', $request->pais)
            ->whereYear('estudiantes.created_at', Carbon::now()->year - 2)
            ->first();
        $añosPoblacionHombrea2 = Estudiante::select(DB::raw('SUM(blanco_hombres) + SUM(afrodescendiente_hombres) + SUM(caucasico_hombres) + SUM(indigena_hombres) + SUM(mestizo_hombres) + SUM(raizal_isleno_hombres) + SUM(rom_gitano_hombres) + SUM(criollo_hombres) + SUM(amerindio_hombres) + SUM(polinesio_hombres) + SUM(melanesio_hombres) + SUM(asiatico_hombres) + SUM(victimas_hombres) + SUM(excombatientes_hombres) + SUM(desplazados_hombres) + SUM(pobreza_hombres)  + SUM(cabeza_hombres) as sumaTotal'))
            ->join('programas', 'estudiantes.programa_id', '=', 'programas.id')
            ->join('escuelas', 'programas.escuela_id', '=', 'escuelas.id')
            ->where('escuelas.pais_id', $request->pais)
            ->whereYear('estudiantes.created_at', Carbon::now()->year - 2)
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

        return view('informes.graficosEspecificos', [
            'chartPoblaciones' => $chartPoblaciones,
            'chartAnos' => $chartAnos]);
                
    }
}
