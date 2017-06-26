@extends('layouts.secundario')
@section('title', 'Crear Usuario')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel-primary auth register">
                <div class="panel-heading">Registro de usuarios</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Usuario</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

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
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
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
                                        <option value="{{$rowpaises->id}}">{{ucfirst($rowpaises->pais)}}</option>
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
                                        <option value="{{$rowroles->id}}">{{ucfirst($rowroles->role)}}</option>
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
                                <input id="password" type="password" class="form-control" name="password" required>

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
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                                    Registrar
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
