<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reporte;
use Storage;
use Auth;

class ReportesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function listar()
    {
        $reportes = Reporte::select('nombre_archivo', 'created_at', 'ruta', 'estado');
        if (Auth::user()->role_id !=1 ) {
            $reportes = $reportes->where('estado', 1);
        }        
        $reportes = $reportes->get();
        return view('reportes.verReportes', ['reportes' => $reportes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reportes.crearReportes');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Storage::disk('local')->put('file.txt', 'Contents');
        $ruta = $request->file('ruta');
        $reporteRoute = time().'_'.$ruta->getClientOriginalName();
        Storage::disk('reportes_files')->put($reporteRoute, file_get_contents( $ruta->getRealPath() ));    
        
        Reporte::create([
            'nombre_archivo' => $request->nombre_archivo,
            'ruta' => $reporteRoute,
            'estado' => $request->estado
        ]);

        $request->session()->flash('success', 'Archivo Cargado exitosamente');
        return redirect()->route('listareportes');
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
