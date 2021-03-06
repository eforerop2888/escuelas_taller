<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestStoreProgramas;
use App\Escuela;
use App\Programa;
use App\Pais;
use App\Estudiante;
use App\Estado;
use App\Modulo;
use Illuminate\Support\Facades\DB;
use Auth;

class ProgramasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programas = Programa::join('escuelas','programas.escuela_id','=','escuelas.id')
            ->join('paises','escuelas.pais_id','=','paises.id')
            ->join('estados','programas.estado_id','=','estados.id')
            ->select('programas.id as id',
            'programas.nombre as nombre',
            'programas.duracion_meses',
            'programas.duracion_horas',
            'programas.duracion_practicas_horas',
            'estados.estado',
            'escuelas.nombre as nombre_escuela',
            'paises.pais',
            'paises.id as pais_id')
            ->orderBy('escuelas.nombre', 'ASC')
            ->orderBy('programas.nombre', 'DESC');
        /*if (Auth::user()->role_id != 1) {
            $programas = $programas->where('pais_id', Auth::user()->pais_id);       
        }*/
        $programas = $programas->get();
        $pais = Pais::find(Auth::user()->pais_id);
        return view('programas.verProgramas', ['programas' => $programas, 'pais' => $pais]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $estados = Estado::all();
        if($request->escuela){
            $escuelas = Escuela::where('id', $request->escuela)
                ->where('pais_id', Auth::user()->pais_id)
                ->get();        
            }else{
                $escuelas = Escuela::where('pais_id', Auth::user()->pais_id)
                    ->get();
            }
        return view('programas.crearPrograma', ['escuelas' => $escuelas, 'estados' => $estados]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestStoreProgramas $request)
    {
        Programa::create(['nombre' => $request->nombre_programa,
                        'duracion_meses' => $request->duracion_meses,
                        'duracion_horas' => $request->duracion_horas,
                        'duracion_practicas_horas' => $request->duracion_practica,
                        'objetivo_programa' => $request->objetivo_programa,
                        'requisitos_ingreso' => $request->requisitos_ingreso,
                        'trabajo_egresados' => $request->trabajo_egresados,
                        'estado_id' => $request->estado,
                        'escuela_id' => $request->escuelas_id,
                        'user_id' => Auth::user()->id,
                        ]);
        $request->session()->flash('success', 'Programa Creado exitosamente');
        return redirect()->route('programas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $programa = Programa::join('escuelas','programas.escuela_id','=','escuelas.id')
            ->join('paises','escuelas.pais_id','=','paises.id')
            ->join('estados','programas.estado_id','=','estados.id')
            ->select('programas.id as id',
            'programas.nombre as nombre',
            'programas.duracion_meses',
            'programas.duracion_horas',
            'programas.duracion_practicas_horas',
            'programas.objetivo_programa',
            'programas.requisitos_ingreso',
            'programas.trabajo_egresados',
            'estados.estado',
            'escuelas.nombre as nombre_escuela',
            'paises.pais',
            'paises.id as pais_id')
            ->where('programas.id', $id)
            ->first();
        $modulos = Modulo::join('tipos_modulos','modulos.tipo_modulo','=','tipos_modulos.id')
            ->select('*', 'modulos.id as id_modulos')
            ->where('programa_id', $id)
            ->get();
        $estudiantes = Estudiante::where('programa_id', $id)
            ->first();
        return view('programas.verDetallePrograma', ['programa' => $programa,
            'estudiantes' => $estudiantes,
            'modulos' => $modulos,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estados = Estado::all();
        $programa = Programa::find($id);
        $escuelas = Escuela::where('escuelas.pais_id', Auth::user()->pais_id)
            ->get();
        return view('programas.editarPrograma', ['programa' => $programa,
            'escuelas' => $escuelas, 'estados' => $estados]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Programa::where('id', $id)
            ->update(['nombre' => $request->nombre_programa,
                    'duracion_meses' => $request->duracion_meses,
                    'duracion_horas' => $request->duracion_horas,
                    'duracion_practicas_horas' => $request->duracion_practica,
                    'objetivo_programa' => $request->objetivo_programa,
                    'requisitos_ingreso' => $request->requisitos_ingreso,
                    'trabajo_egresados' => $request->trabajo_egresados,
                    'escuela_id' => $request->escuelas_id,
                    'estado_id' => $request->estado,
                    'user_id' => Auth::user()->id,
        ]);
        $request->session()->flash('success', 'Programa actualizado exitosamente');
        return redirect()->route('programas.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $programa = Programa::find($id);
        try {
            $programa->delete();
            $request->session()->flash('success', 'Programa borrado con exito');
        } catch ( \Exception $e) {
            if($e->getCode() === '23000') {
                //var_dump($e->errorInfo);
                $request->session()->flash('fail', 'El programa ya cuenta con relaciones');
                }
        }
        return redirect()->route('programas.index');
    }
}
