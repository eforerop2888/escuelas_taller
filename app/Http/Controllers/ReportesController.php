<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reporte;
use App\Pais;
use Storage;
use Auth;
use File;

class ReportesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function listar()
    {
        $pais = Pais::find(Auth::user()->pais_id);
        $reportes = Reporte::join('users', 'users.id', '=', 'reportes.user_id')
            ->select('reportes.nombre_archivo',
                'reportes.created_at',
                'reportes.ruta',
                'reportes.id as reporte_id')
            ->where('users.pais_id', Auth::user()->pais_id)
            ->get();
        return view('reportes.verReportes', ['reportes' => $reportes, 'pais' => $pais]);
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
            'user_id' => Auth::user()->id
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
    public function destroy($id, Request $request)
    {
        $reporte = Reporte::find($id);
        try {
            $path = public_path() . "/reportes_files/" . $reporte->ruta;
            $reporte->delete();
            File::delete($path);
            $request->session()->flash('success', 'Reporte borrado con exito');
        } catch ( \Exception $e) {
            if($e->getCode() === '23000') {
                //var_dump($e->errorInfo);
                $request->session()->flash('fail', 'El reporte ya cuenta con relaciones');
                }
        }
        return redirect()->route('listareportes');
    }
}
