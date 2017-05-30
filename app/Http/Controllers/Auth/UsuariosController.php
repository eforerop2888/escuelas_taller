<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestStoreUsuarios;
use App\Pais;
use App\Role;
use App\User;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::join('paises', 'pais_id', '=', 'paises.id')
            ->join('roles', 'role_id', '=', 'roles.id')
            ->select('users.name', 'users.email', 'paises.pais', 'roles.role',
                'users.id as id_users')
            ->get();
        return view('auth.verUsuarios', ['usuarios' => $usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = User::join('paises', 'users.pais_id', '=', 'paises.id')
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->select('users.id as user_id',
                'users.name',
                'users.email',
                'paises.pais',
                'roles.role')
            ->where('users.id', $id)
            ->first();
        return view('auth.verDetalleUsuario', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = User::join('paises', 'users.pais_id', '=', 'paises.id')
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->select('users.id as user_id',
                'users.name',
                'users.email',
                'paises.pais',
                'roles.role',
                'users.pais_id',
                'users.role_id')
            ->where('users.id', $id)
            ->first();
        $paises = Pais::all();
        $roles = Role::all();
        return view('auth.editarUsuario', ['usuario' => $usuario,
            'roles' => $roles,
            'paises' => $paises]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestStoreUsuarios $request, $id)
    {

        User::where('id', $id)
        ->update([
            'name' => $request->name,
            'email' => $request->email,
            'pais_id' => $request->pais_id,
            'role_id' => $request->role_id
        ]);
        

        if(!empty($request->password)){
            User::where('id', $id)
            ->update([
                'password' => bcrypt($request->password)
                ]);
        }

        $request->session()->flash('success', 'Usuario editado exitosamente');
        return redirect()->route('usuarios.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $usuario = User::find($id);
        try {
            $usuario->delete();
            $request->session()->flash('success', 'Usuario borrado con exito');
        } catch ( \Exception $e) {
            if($e->getCode() === '23000') {
                //var_dump($e->errorInfo);
                $request->session()->flash('fail', 'El usuario ya cuenta con relaciones');
                }
        }
        return redirect()->route('usuarios.index');
    }
}
