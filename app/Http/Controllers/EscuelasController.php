<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestStoreEscuelas;
use App\Escuela;
use App\Pais;
use Auth;

class EscuelasController extends Controller
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
        $paises = Pais::all();
        return view('escuelas/crearEscuela', ['paises' => $paises]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestStoreEscuelas $request)
    {
        Escuela::create(['nombre' => $request->nombre_escuela,
                        'pagina_web' => $request->pagina_web,
                        'direccion' => $request->direccion,
                        'telefono' => $request->telefono,
                        'director' => $request->director,
                        'director_email' => $request->email,
                        'coordinador' => $request->coordinador,
                        'coordinador_email' => $request->email_c,
                        'coordinador_humano' => $request->humano,
                        'coordinador_humano_email' => $request->email_h,
                        'acto_administrativo' => $request->acto,
                        'otorga_permiso' => $request->permiso,
                        'pais_id' => $request->pais_id,
                        'user_id' => Auth::user()->id]);
        return "hola";
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
