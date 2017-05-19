<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Programa;
use App\Cooperante;
use App\Http\Requests\RequestStoreCooperantes;

class CooperantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cooperantes = Cooperante::select('id',
            'nombre',
            'persona_contacto',
            'mail_contacto')
            ->get();
        return view('cooperantes.verCooperantes', ['cooperantes' => $cooperantes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programas = Programa::all();
        return view('cooperantes.crearCooperante', ['programas' => $programas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestStoreCooperantes $request)
    {
        Cooperante::create(['nombre' => $request->nombre_cooperante,
                        'persona_contacto' => $request->persona_contacto,
                        'mail_contacto' => $request->mail_contacto,
                        'programa_id' => $request->programa,
                        'tipo_cooperacion' => $request->tipo_cooperacion,
                        'resultados_significativos' => $request->resultados_significativos,
                    ]);

        $request->session()->flash('success', 'Cooperante creado exitosamente');
        return redirect()->route('cooperantes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cooperante = Cooperante::where('cooperantes.id', $id)
            ->join('programas', 'programa_id', '=', 'programas.id')
            ->select('programas.nombre as nombre_programa',
             'cooperantes.nombre as nombre_cooperante',
             'cooperantes.mail_contacto',
             'cooperantes.persona_contacto',
             'cooperantes.tipo_cooperacion',
             'cooperantes.resultados_significativos',
             'cooperantes.id'
             )
            ->first();
        return view('cooperantes.verDetalleCooperante', ['cooperante' => $cooperante]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cooperante = Cooperante::find($id);
        $programas = Programa::all();
        return view('cooperantes.editarCooperante', ['cooperante' => $cooperante,
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
        Cooperante::where('id', $id)
            ->update(['nombre' => $request->nombre_cooperante,
                    'persona_contacto' => $request->persona_contacto,
                    'mail_contacto' => $request->mail_contacto,
                    'programa_id' => $request->programa,
                    'tipo_cooperacion' => $request->tipo_cooperacion,
                    'resultados_significativos' => $request->resultados_significativos,
        ]);
        $request->session()->flash('success', 'Cooperante actualizado exitosamente');
        return redirect()->route('cooperantes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $cooperante = Cooperante::find($id);
        try {
            $cooperante->delete();
            $request->session()->flash('success', 'Cooperante borrado con exito');
        } catch ( \Exception $e) {
            if($e->getCode() === '23000') {
                //var_dump($e->errorInfo);
                $request->session()->flash('fail', 'El cooperante ya cuenta con relaciones');
                }
        }
        return redirect()->route('cooperantes.index');
    }
}
