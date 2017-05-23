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
         Insertando informacion estudiantes mujeres
        */
        Estudiante::create([
            'etnia' => $request->etnia_mujeres,
            'victimas' => $request->victimas_mujeres,
            'excombatientes' => $request->excombatientes_mujeres,
            'desplazados' => $request->desplazados_mujeres,
            'pobreza' => $request->pobreza_mujeres,
            'certificados' => $request->certificados_mujeres,
            'programa_id' => $request->programa,
            'user_id' => Auth::user()->id,
            'genero_id' => 1,
        ]);
        /*
         Insertando informacion estudiantes hombres
        */
        Estudiante::create([
            'etnia' => $request->etnia_hombres,
            'victimas' => $request->victimas_hombres,
            'excombatientes' => $request->excombatientes_hombres,
            'desplazados' => $request->desplazados_hombres,
            'pobreza' => $request->pobreza_hombres,
            'certificados' => $request->certificados_hombres,
            'programa_id' => $request->programa,
            'user_id' => Auth::user()->id,
            'genero_id' => 2,
        ]);

        Programa::where('id', $request->programa)
        ->update(['causas_desercion' => $request->causas_desercion]);

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
        $estudiantes_mujeres = Estudiante::where('programa_id', $id)
            ->where('genero_id', 1)
            ->first();
        $estudiantes_hombres = Estudiante::where('programa_id', $id)
            ->where('genero_id', 2)
            ->first();
        $programaD = Programa::where('id', $id)
            ->select('causas_desercion', 'id')
            ->first();
        return view('estudiantes.editarEstudiantes', ['programas' => $programas,
            'estudiantes_mujeres' => $estudiantes_mujeres,
            'estudiantes_hombres' => $estudiantes_hombres,
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
         Actualizando informacion estudiantes mujeres
        */
        Estudiante::where('programa_id', $id)
            ->where('id', $request->id_mujeres)
            ->update([
            'etnia' => $request->etnia_mujeres,
            'victimas' => $request->victimas_mujeres,
            'excombatientes' => $request->excombatientes_mujeres,
            'desplazados' => $request->desplazados_mujeres,
            'pobreza' => $request->pobreza_mujeres,
            'certificados' => $request->certificados_mujeres,
        ]);
        /*
         Insertando informacion estudiantes hombres
        */
        Estudiante::where('programa_id', $id)
            ->where('id', $request->id_hombres)
            ->update([
            'etnia' => $request->etnia_hombres,
            'victimas' => $request->victimas_hombres,
            'excombatientes' => $request->excombatientes_hombres,
            'desplazados' => $request->desplazados_hombres,
            'pobreza' => $request->pobreza_hombres,
            'certificados' => $request->certificados_hombres,
        ]);

        Programa::where('id', $id)
        ->update(['causas_desercion' => $request->causas_desercion]);

        $request->session()->flash('success', 'Información de los estudiantes actualizada exitosamente');
        return redirect()->route('programas.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
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
