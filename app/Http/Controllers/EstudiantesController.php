<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Programa;
use App\Estudiante;
use App\Http\Requests\RequestStoreEstudiantes;

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
    public function create()
    {
        $programas = Programa::all();
        return view('estudiantes.crearEstudiantes', ['programas' => $programas]);
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
            'genero_id' => 2,
        ]);

        Programa::where('id', $request->programa)
        ->update(['causas_desercion' => $request->causas_desercion]);

        return "Exitoso";
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
