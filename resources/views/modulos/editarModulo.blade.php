@extends('layouts.principal')
@section('title', 'Editar Módulo')
@section('subtitle', 'EDITAR MÓDULO')
@section('content')
	{{Form::open(['route' => ['modulos.update', $modulo->id_modulos], 'method' => 'PUT', 'id' => 'form-editar-modulo'])}}
		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('nombre_modulo') ? ' has-error ' : ''}}">
					<label for="nombre_modulo">Nombre del Módulo</label>
					<input type="text" id="nombre_modulo" name="nombre_modulo" class="form-control" value="{{$modulo->nombre_modulo}}" required placeholder="Nombre del módulo" autofocus>
					@if ($errors->has('nombre_modulo'))
			            <span>
			              <strong>{{ $errors->first('nombre_modulo') }}</strong>
			            </span>
		        	@endif
				</div>
			</div>
			<div class="col-md-6">
				<label for="tipo_modulo">Tipo de Módulo</label>
				<div class="form-group {{ $errors->has('tipo_modulo') ? ' has-error ' : ''}}">
					<div class="radio">
					  <label>
					    <input type="radio" name="tipo_modulo" id="tipo_modulo1" value="1" {{ $modulo->tipo_modulo == 1 ? 'checked' : '' }}>
					    Práctico
					  </label>
					</div>
					<div class="radio">
					  <label>
					    <input type="radio" name="tipo_modulo" id="tipo_modulo2" value="2" {{ $modulo->tipo_modulo == 2 ? 'checked' : '' }}>
					    Teórico
					  </label>
					</div>
					@if ($errors->has('tipo_modulo'))
			            <span>
			              <strong>{{ $errors->first('tipo_modulo') }}</strong>
			            </span>
		        	@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('duracion') ? ' has-error ' : ''}}">
					<label for="duracion">Duración del Módulo (Meses)</label>
					<input type="number" id="duracion" name="duracion" class="form-control" value="{{$modulo->duracion}}" required placeholder="Duración de la Módulo">
					@if ($errors->has('duracion'))
			            <span>
			              <strong>{{ $errors->first('duracion') }}</strong>
			            </span>
			      	@endif
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('objetivo') ? ' has-error ' : ''}}">
					<label for="objetivo">Objetivo del Módulo</label>
					<textarea id="objetivo" name="objetivo" class="form-control"  required>{{$modulo->objetivo}}</textarea>
					@if ($errors->has('objetivo'))
			          <span>
			            <strong>{{ $errors->first('objetivo') }}</strong>
			          </span>
			      	@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('nombre_maestro') ? ' has-error ' : ''}}">
					<label for="nombre_maestro">Nombre del Maestro</label>
					<input type="text" id="nombre_maestro" name="nombre_maestro" class="form-control" value="{{$modulo->nombre_maestro}}" required placeholder="Nombre del Maestro">
					@if ($errors->has('nombre_maestro'))
			            <span>
			              <strong>{{ $errors->first('nombre_maestro') }}</strong>
			            </span>
		        	@endif
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('mail_maestro') ? ' has-error ' : ''}}">
					<label for="mail_maestro">Mail del Maestro</label>
					<input type="email" id="mail_maestro" name="mail_maestro" class="form-control" value="{{$modulo->mail_maestro}}" required placeholder="Mail del Maestro">
					@if ($errors->has('mail_maestro'))
			            <span>
			              <strong>{{ $errors->first('mail_maestro') }}</strong>
			            </span>
		        	@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('experiencia') ? ' has-error ' : ''}}">
					<label for="experiencia">Experiencia del Maestro</label>
					<textarea id="experiencia" name="experiencia" class="form-control"  required>{{$modulo->experiencia}}</textarea>
					@if ($errors->has('experiencia'))
			          <span>
			            <strong>{{ $errors->first('experiencia') }}</strong>
			          </span>
			      	@endif
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('programa') ? ' has-error ' : ''}}">
					<label for="programa">Programa</label>
					<select id="programa" name="programa" class="form-control" required>
						@foreach($programas as $rowProgramas)
							<option value="{{$rowProgramas->id}}">{{$rowProgramas->nombre}}</option>
						@endforeach
					</select>
					@if ($errors->has('programa'))
			          <span>
			            <strong>{{ $errors->first('programa') }}</strong>
			          </span>
			      	@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<button type="submit" class="btn btn-primary">Guardar</button>
			</div>
		</div>
	{{Form::close()}}
@endsection