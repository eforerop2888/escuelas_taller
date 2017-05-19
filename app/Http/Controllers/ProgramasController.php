<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestStoreProgramas;
use App\Escuela;
use App\Programa;

class ProgramasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programas = Programa::select('id',
            'nombre',
            'duracion_meses',
            'duracion_horas',
            'duracion_practicas_horas')
        ->get();
        return view('programas.verProgramas', ['programas' => $programas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $escuelas = Escuela::all();
        return view('programas.crearPrograma', ['escuelas' => $escuelas]);
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
                        'escuela_id' => $request->escuelas_id
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
        $programa = Programa::where('id', $id)
            ->first();
        return view('programas.verDetallePrograma', ['programa' => $programa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $programa = Programa::find($id);
        $escuelas = Escuela::all();
        return view('programas.editarPrograma', ['programa' => $programa,
            'escuelas' => $escuelas]);
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
                    'escuela_id' => $request->escuelas_id
        ]);
        $request->session()->flash('success', 'Programa actualizado exitosamente');
        return redirect()->route('programas.index');
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
