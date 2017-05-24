<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestStoreModulos;
use App\Programa;
use App\Modulo;
use Auth;

class ModulosController extends Controller
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
        $programas = Programa::where('id', $request->programa_id_m)
            ->get();
        
        return view('modulos.crearModulo', ['programas' => $programas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Modulo::create(['nombre' => $request->nombre_modulo,
                        'tipo_modulo' => $request->tipo_modulo,
                        'duracion' => $request->duracion,
                        'objetivo' => $request->objetivo,
                        'nombre_maestro' => $request->nombre_maestro,
                        'mail_maestro' => $request->mail_maestro,
                        'experiencia' => $request->experiencia,
                        'programa_id' => $request->programa,
                        'user_id' => Auth::user()->id,
                    ]);
        $request->session()->flash('success', 'Módulo Creado exitosamente');
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
        $modulo = Modulo::join('tipos_modulos','modulos.tipo_modulo','=','tipos_modulos.id')
            ->join('programas','modulos.programa_id','=','programas.id')
            ->select('*',
                'modulos.id as id_modulos',
                'programas.nombre as nombre_programa',
                'modulos.nombre as nombre_modulo',
                'programas.id as id_programa')
            ->where('modulos.id', $id)
            ->first();
        return view('modulos.verDetalleModulo', ['modulo' => $modulo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $modulo = Modulo::join('tipos_modulos','modulos.tipo_modulo','=','tipos_modulos.id')
            ->join('programas','modulos.programa_id','=','programas.id')
            ->select('*',
                'modulos.id as id_modulos',
                'programas.nombre as nombre_programa',
                'modulos.nombre as nombre_modulo')
            ->where('modulos.id', $id)
            ->first();
        $programas = Programa::where('id', $request->programa_id)
            ->get();
        return view('modulos.editarModulo', ['modulo' => $modulo,
         'programas' => $programas]);
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
        Modulo::where('id', $id)
            ->update(['nombre' => $request->nombre_modulo,
                        'tipo_modulo' => $request->tipo_modulo,
                        'duracion' => $request->duracion,
                        'objetivo' => $request->objetivo,
                        'nombre_maestro' => $request->nombre_maestro,
                        'mail_maestro' => $request->mail_maestro,
                        'experiencia' => $request->experiencia,
                    ]);
        $request->session()->flash('success', 'Módulo Actualizado exitosamente');
        return redirect()->route('programas.show', $request->programa);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $modulo = Modulo::find($id);
        try {
            $modulo->delete();
            $request->session()->flash('success', 'Módulo borrado con exito');
        } catch ( \Exception $e) {
            if($e->getCode() === '23000') {
                //var_dump($e->errorInfo);
                $request->session()->flash('fail', 'El módulo ya cuenta con relaciones');
                }
        }
        $request->session()->flash('success', 'Módulo eliminado exitosamente');
        return redirect()->route('programas.show', $request->id_programam);
    }
}
