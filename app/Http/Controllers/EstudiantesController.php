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
            'blanco_mujeres' => $request->blanco_mujeres,
            'blanco_hombres' => $request->blanco_hombres,
            'caucasico_mujeres' => $request->caucasico_mujeres,
            'caucasico_hombres' => $request->caucasico_hombres,
            'afrodescendiente_mujeres' => $request->afrodescendiente_mujeres,
            'afrodescendiente_hombres' => $request->afrodescendiente_hombres,
            'indigena_mujeres' => $request->indigena_mujeres,
            'indigena_hombres' => $request->indigena_hombres,
            'mestizo_mujeres' => $request->mestizo_mujeres,
            'mestizo_hombres' => $request->mestizo_hombres,
            'raizal_isleno_mujeres' => $request->raizal_isleno_mujeres,
            'raizal_isleno_hombres' => $request->raizal_isleno_hombres,
            'rom_gitano_mujeres' => $request->rom_gitano_mujeres,
            'rom_gitano_hombres' => $request->rom_gitano_hombres,
            'criollo_mujeres' => $request->criollo_mujeres,
            'criollo_hombres' => $request->criollo_hombres,
            'amerindio_mujeres' => $request->amerindio_mujeres,
            'amerindio_hombres' => $request->amerindio_hombres,
            'polinesio_mujeres' => $request->polinesio_mujeres,
            'polinesio_hombres' => $request->polinesio_hombres,
            'melanesio_mujeres' => $request->melanesio_mujeres,
            'melanesio_hombres' => $request->melanesio_hombres,
            'asiatico_mujeres' => $request->asiatico_mujeres,
            'asiatico_hombres' => $request->asiatico_hombres,
            'victimas_mujeres' => $request->victimas_mujeres,
            'victimas_hombres' => $request->victimas_hombres,
            'excombatientes_mujeres' => $request->excombatientes_mujeres,
            'excombatientes_hombres' => $request->excombatientes_hombres,
            'desplazados_mujeres' => $request->desplazados_mujeres,
            'desplazados_hombres' => $request->desplazados_hombres,
            'pobreza_mujeres' => $request->pobreza_mujeres,
            'pobreza_hombres' => $request->pobreza_hombres,
            'cabeza_mujeres' => $request->cabeza_mujeres,
            'cabeza_hombres' => $request->cabeza_hombres,
            'certificados_mujeres' => $request->certificados_mujeres,
            'certificados_hombres' => $request->certificados_hombres,
            'egresados_programa_hombres' => $request->egresados_programa_hombres,
            'egresados_programa_mujeres' => $request->egresados_programa_mujeres,
            'egresados_trabajo_hombres' => $request->egresados_trabajo_hombres,
            'egresados_trabajo_mujeres' => $request->egresados_trabajo_mujeres,
            'egresados_trabajo_otro_hombres' => $request->egresados_trabajo_otro_hombres,
            'egresados_trabajo_otro_mujeres' => $request->egresados_trabajo_otro_mujeres,
            'egresados_desempleados_hombres' => $request->egresados_desempleados_hombres,
            'egresados_desempleados_mujeres' => $request->egresados_desempleados_mujeres,
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
                'blanco_mujeres' => $request->blanco_mujeres,
                'blanco_hombres' => $request->blanco_hombres,
                'caucasico_mujeres' => $request->caucasico_mujeres,
                'caucasico_hombres' => $request->caucasico_hombres,
                'afrodescendiente_mujeres' => $request->afrodescendiente_mujeres,
                'afrodescendiente_hombres' => $request->afrodescendiente_hombres,
                'indigena_mujeres' => $request->indigena_mujeres,
                'indigena_hombres' => $request->indigena_hombres,
                'mestizo_mujeres' => $request->mestizo_mujeres,
                'mestizo_hombres' => $request->mestizo_hombres,
                'raizal_isleno_mujeres' => $request->raizal_isleno_mujeres,
                'raizal_isleno_hombres' => $request->raizal_isleno_hombres,
                'rom_gitano_mujeres' => $request->rom_gitano_mujeres,
                'rom_gitano_hombres' => $request->rom_gitano_hombres,
                'criollo_mujeres' => $request->criollo_mujeres,
                'criollo_hombres' => $request->criollo_hombres,
                'amerindio_mujeres' => $request->amerindio_mujeres,
                'amerindio_hombres' => $request->amerindio_hombres,
                'polinesio_mujeres' => $request->polinesio_mujeres,
                'polinesio_hombres' => $request->polinesio_hombres,
                'melanesio_mujeres' => $request->melanesio_mujeres,
                'melanesio_hombres' => $request->melanesio_hombres,
                'asiatico_mujeres' => $request->asiatico_mujeres,
                'asiatico_hombres' => $request->asiatico_hombres,
                'victimas_mujeres' => $request->victimas_mujeres,
                'victimas_hombres' => $request->victimas_hombres,
                'excombatientes_mujeres' => $request->excombatientes_mujeres,
                'excombatientes_hombres' => $request->excombatientes_hombres,
                'desplazados_mujeres' => $request->desplazados_mujeres,
                'desplazados_hombres' => $request->desplazados_hombres,
                'pobreza_mujeres' => $request->pobreza_mujeres,
                'pobreza_hombres' => $request->pobreza_hombres,
                'cabeza_mujeres' => $request->cabeza_mujeres,
                'cabeza_hombres' => $request->cabeza_hombres,
                'certificados_mujeres' => $request->certificados_mujeres,
                'certificados_hombres' => $request->certificados_hombres,
                'certificados_mujeres' => $request->certificados_mujeres,
                'certificados_hombres' => $request->certificados_hombres,
                'egresados_programa_hombres' => $request->egresados_programa_hombres,
                'egresados_programa_mujeres' => $request->egresados_programa_mujeres,
                'egresados_trabajo_hombres' => $request->egresados_trabajo_hombres,
                'egresados_trabajo_mujeres' => $request->egresados_trabajo_mujeres,
                'egresados_trabajo_otro_hombres' => $request->egresados_trabajo_otro_hombres,
                'egresados_trabajo_otro_mujeres' => $request->egresados_trabajo_otro_mujeres,
                'egresados_desempleados_hombres' => $request->egresados_desempleados_hombres,
                'egresados_desempleados_mujeres' => $request->egresados_desempleados_mujeres,
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
