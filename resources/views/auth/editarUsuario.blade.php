@extends('layouts.secundario')
@section('title', 'Editar Usuarios')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel-primary auth register">
                <div class="panel-heading">Edición de usuario {{$usuario->name}}</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('usuarios.update', $usuario->user_id) }}">
                        <input name="_method" type="hidden" value="PUT">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Usuario</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$usuario->name}}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Email</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{$usuario->email}}">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('pais_id') ? ' has-error ' : ''}}">
                            <label for="pais_id" class="col-md-4 control-label">País</label>
                            <div class="col-md-6">
                                <select id="pais_id" name="pais_id" class="form-control" required>
                                    @foreach ($paises as $rowpaises)
                                        @if ($usuario->pais_id == $rowpaises->id)
                                            <option value="{{$rowpaises->id}}" selected>{{ucfirst($rowpaises->pais)}}</option>
                                            @else
                                                <option value="{{$rowpaises->id}}">{{ucfirst($rowpaises->pais)}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @if ($errors->has('pais_id'))
                                    <span>
                                        <strong>{{ $errors->first('pais_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('role_id') ? ' has-error ' : ''}}">
                            <label for="role_id" class="col-md-4 control-label">Rol</label>
                            <div class="col-md-6">
                                <select id="role_id" name="role_id" class="form-control" required>
                                    @foreach ($roles as $rowroles)
                                        @if ($usuario->role_id == $rowroles->id)
                                            <option value="{{$rowroles->id}}" selected>{{ucfirst($rowroles->role)}}</option>
                                            @else
                                                <option value="{{$rowroles->id}}">{{ucfirst($rowroles->role)}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @if ($errors->has('role_id'))
                                    <span>
                                        <strong>{{ $errors->first('role_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar contraseña</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Guardar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
