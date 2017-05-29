<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Programa;
use App\Estudiante;
use App\Http\Requests\RequestStoreEstudiantes;
use Auth;

class EstudiantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $programas = Programa::where('id', $request->programa_id)
            ->get();
        $estudiantes = Estudiante::where('programa_id', $request->programa_id)
            ->first();
        if($estudiantes){
            return $this->edit($request->programa_id);
        }else{
            return view('estudiantes.crearEstudiantes', ['programas' => $programas,
                'estudiantes' => $estudiantes]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestStoreEstudiantes $request)
    {
        /*
         Insertando informacion estudiantes
        */
        Estudiante::create([
            'etnia_mujeres' => $request->etnia_mujeres,
            'etnia_hombres' => $request->etnia_hombres,
            'victimas_mujeres' => $request->victimas_mujeres,
            'victimas_hombres' => $request->victimas_hombres,
            'excombatientes_mujeres' => $request->excombatientes_mujeres,
            'excombatientes_hombres' => $request->excombatientes_hombres,
            'desplazados_mujeres' => $request->desplazados_mujeres,
            'desplazados_hombres' => $request->desplazados_hombres,
            'pobreza_mujeres' => $request->pobreza_mujeres,
            'pobreza_hombres' => $request->pobreza_hombres,
            'certificados_mujeres' => $request->certificados_mujeres,
            'certificados_hombres' => $request->certificados_hombres,
            'total_mujeres' => $request->total_mujeres,
            'total_hombres' => $request->total_hombres,
            'causas_desercion' => $request->causas_desercion,
            'observaciones' => $request->observaciones,
            'programa_id' => $request->programa,
            'user_id' => Auth::user()->id,
        ]);

        $request->session()->flash('success', 'Información de los estudiantes creada exitosamente');
        return redirect()->route('programas.show', $request->programa);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $programas = Programa::where('id', $id)
            ->get();
        $estudiantes = Estudiante::where('programa_id', $id)
            ->first();
        $programaD = Programa::where('id', $id)
            ->select('id')
            ->first();
        return view('estudiantes.editarEstudiantes', ['programas' => $programas,
            'estudiantes' => $estudiantes,
            'programaD' => $programaD]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestStoreEstudiantes $request, $id)
    {
        /*
         Actualizando informacion estudiantes
        */
        Estudiante::where('programa_id', $id)
            ->where('id', $request->id_estudiantes)
            ->update([
            'etnia_mujeres' => $request->etnia_mujeres,
            'etnia_hombres' => $request->etnia_hombres,
            'victimas_mujeres' => $request->victimas_mujeres,
            'victimas_hombres' => $request->victimas_hombres,
            'excombatientes_mujeres' => $request->excombatientes_mujeres,
            'excombatientes_hombres' => $request->excombatientes_hombres,
            'desplazados_mujeres' => $request->desplazados_mujeres,
            'desplazados_hombres' => $request->desplazados_hombres,
            'pobreza_mujeres' => $request->pobreza_mujeres,
            'pobreza_hombres' => $request->pobreza_hombres,
            'certificados_mujeres' => $request->certificados_mujeres,
            'certificados_hombres' => $request->certificados_hombres,
            'total_mujeres' => $request->total_mujeres,
            'total_hombres' => $request->total_hombres,
            'causas_desercion' => $request->causas_desercion,
            'observaciones' => $request->observaciones,
        ]);

        $request->session()->flash('success', 'Información de los estudiantes actualizada exitosamente');
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
        $estudiantes = Estudiante::where('programa_id', $id);
        try {
            $estudiantes->delete();
            $request->session()->flash('success', 'Información de los estudiantes del curso borrada con exito');
        } catch ( \Exception $e) {
            if($e->getCode() === '23000') {
                //var_dump($e->errorInfo);
                $request->session()->flash('fail', 'La información de estudiantes ya cuenta con relaciones');
                }
        }
        $request->session()->flash('success', 'Información Estudiantes eliminada exitosamente');
        return redirect()->route('programas.show', $id);
    }
}
