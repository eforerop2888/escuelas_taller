<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestStoreCursosExtension;
use App\CursoExtension;

class CursosExtensionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursosExtension = CursoExtension::select('id',
            'nombre',
            'duracion',
            'costo',
            'contacto')
            ->get();
        return view('cursos.verCursos', ['cursosExtension' => $cursosExtension]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cursos.crearCursos');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestStoreCursosExtension $request)
    {
        CursoExtension::create([
            'nombre' => $request->nombre_curso,
            'objetivo_curso' => $request->objetivo_curso,
            'duracion' => $request->duracion,
            'costo' => $request->costo,
            'contacto' => $request->contacto
        ]);

        $request->session()->flash('success', 'Curso de extensión creado exitosamente');
        return redirect()->route('cursos.index');
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
        $curso = CursoExtension::where('id', $id)
            ->first();
        return view('cursos.verDetalleCurso', ['curso' => $curso]);
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
        $curso = CursoExtension::find($id);
        try {
            $curso->delete();
            $request->session()->flash('success', 'Curso borrado con exito');
        } catch ( \Exception $e) {
            if($e->getCode() === '23000') {
                //var_dump($e->errorInfo);
                $request->session()->flash('fail', 'El curso ya cuenta con relaciones');
                }
        }
        return redirect()->route('cursos.index');
    }
}
