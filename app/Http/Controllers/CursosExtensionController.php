<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestStoreCursosExtension;
use App\CursoExtension;
use App\Pais;
use App\Escuela;
use Auth;

class CursosExtensionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('access', ['only' => ['index']]);
    }

    public function index()
    {
        $pais = Pais::find(Auth::user()->pais_id);
        $cursosExtension = CursoExtension::join('escuelas','cursos_extension.escuela_id','=','escuelas.id')
            ->select('cursos_extension.id as id',
            'cursos_extension.nombre as nombre_curso',
            'duracion',
            'costo',
            'escuelas.nombre as nombre_escuela')
            ->get();
        return view('cursos.verCursos', ['cursosExtension' => $cursosExtension,
        'pais' => $pais]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $escuelas = Escuela::where('pais_id', Auth::user()->pais_id)
            ->get();
        return view('cursos.crearCursos', ['escuelas' => $escuelas]);
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
            'temas' => $request->temas,
            'escuela_id' => $request->escuela_id,
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
        $curso = CursoExtension::join('escuelas','cursos_extension.escuela_id','=','escuelas.id')
            ->select('cursos_extension.id as id',
            'cursos_extension.nombre as nombre_curso',
            'duracion',
            'costo',
            'temas',
            'objetivo_curso',
            'escuelas.nombre as nombre_escuela')
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
        $escuelas = Escuela::where('pais_id', Auth::user()->pais_id)
            ->get();
        $curso = CursoExtension::find($id);
        return view('cursos.editarCurso', ['curso' => $curso,
            'escuelas' => $escuelas]);
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
                'temas' => $request->temas,
                'escuela_id' => $request->escuela_id,
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
