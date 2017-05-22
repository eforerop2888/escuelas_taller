<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestStoreCursosExtension;
use App\CursoExtension;
use App\Pais;
use Auth;

class CursosExtensionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursosExtension = CursoExtension::join('paises','cursos_extension.pais_id','=','paises.id')
            ->select('cursos_extension.id as id',
            'nombre',
            'duracion',
            'costo',
            'contacto',
            'paises.pais')
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
        $paises = Pais::all();
        return view('cursos.crearCursos', ['paises' => $paises]);
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
            'contacto' => $request->contacto,
            'pais_id' => $request->pais_id,
            'user_id' => Auth::user()->id
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
        $curso = CursoExtension::join('paises','cursos_extension.pais_id','=','paises.id')
            ->select('cursos_extension.id as id',
            'nombre',
            'duracion',
            'costo',
            'contacto',
            'objetivo_curso',
            'paises.pais')
            ->where('cursos_extension.id', $id)
            ->first();
        return view('cursos.verDetalleCurso', ['curso' => $curso]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paises = Pais::all();
        $curso = CursoExtension::find($id);
        return view('cursos.editarCurso', ['curso' => $curso,
            'paises' => $paises]);
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
        CursoExtension::where('id', $id)
            ->update([
                'nombre' => $request->nombre_curso,
                'objetivo_curso' => $request->objetivo_curso,
                'duracion' => $request->duracion,
                'costo' => $request->costo,
                'contacto' => $request->contacto,
                'pais_id' => $request->pais_id,
                'user_id' => Auth::user()->id
            ]);
        $request->session()->flash('success', 'Curso actualizado exitosamente');
        return redirect()->route('cursos.index');
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
