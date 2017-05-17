@extends('layouts.principal')
@section('title', 'Crear Programa')
@section('subtitle', 'CREAR PROGRAMA')
@section('content')
	{{Form::open(['route' => 'programas.store', 'method' => 'POST', 'id' => 'form-crear-programa'])}}
		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('nombre_programa') ? ' has-error ' : ''}}">
					<label for="nombre_programa">Nombre Programa</label>
					<input type="text" id="nombre_programa" name="nombre_programa" class="form-control" required placeholder="Nombre Programa" autofocus>
					@if ($errors->has('nombre_programa'))
            <span>
              <strong>{{ $errors->first('nombre_programa') }}</strong>
            </span>
        	@endif
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('duracion_meses') ? ' has-error ' : ''}}">
					<label for="duracion_meses">Duración meses</label>
					<input type="number" id="duracion_meses" name="duracion_meses" class="form-control" required placeholder="Duración meses">
					@if ($errors->has('duracion_meses'))
			            <span>
			              <strong>{{ $errors->first('duracion_meses') }}</strong>
			            </span>
		        	@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('duracion_horas') ? ' has-error ' : ''}}">
					<label for="duracion_horas">Duracion horas</label>
					<input type="number" id="duracion_horas" name="duracion_horas" class="form-control" required placeholder="Duracion horas">
					@if ($errors->has('duracion_horas'))
			            <span>
			              <strong>{{ $errors->first('duracion_horas') }}</strong>
			            </span>
		        	@endif
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('duracion_practica') ? ' has-error ' : ''}}">
					<label for="duracion_practica">Duracion Practica (Horas)</label>
					<input type="number" id="duracion_practica" name="duracion_practica" class="form-control" required placeholder="Duracion Practica (Horas)">
					@if ($errors->has('duracion_practica'))
			            <span>
			              <strong>{{ $errors->first('duracion_practica') }}</strong>
			            </span>
			        @endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('objetivo_programa') ? ' has-error ' : ''}}">
					<label for="objetivo_programa">Objetivo del Programa</label>
					<textarea id="objetivo_programa" name="objetivo_programa" class="form-control" required></textarea>
					@if ($errors->has('objetivo_programa'))
			            <span>
			              <strong>{{ $errors->first('objetivo_programa') }}</strong>
			            </span>
			      	@endif
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('requisitos_ingreso') ? ' has-error ' : ''}}">
					<label for="requisitos_ingreso">Requisitos de Ingreso</label>
					<textarea id="requisitos_ingreso" name="requisitos_ingreso" class="form-control" required></textarea>
					@if ($errors->has('requisitos_ingreso'))
			            <span>
			              <strong>{{ $errors->first('requisitos_ingreso') }}</strong>
			            </span>
		        	@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('trabajo_egresados') ? ' has-error ' : ''}}">
					<label for="trabajo_egresados">En donde trabajan los egresados</label>
					<textarea id="trabajo_egresados" name="trabajo_egresados" class="form-control" required></textarea>
					@if ($errors->has('trabajo_egresados'))
			            <span>
			              <strong>{{ $errors->first('trabajo_egresados') }}</strong>
			            </span>
		        	@endif
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('escuelas_id') ? ' has-error ' : ''}}">
					<label for="escuelas_id">Seleccionar Escuela</label>
					<select id="escuelas_id" name="escuelas_id" class="form-control">
						@foreach($escuelas as $rowEscuelas)
							<option value="{{$rowEscuelas->id}}">{{$rowEscuelas->nombre}}</option>
						@endforeach
					</select>
					@if ($errors->has('escuelas_id'))
			            <span>
			              <strong>{{ $errors->first('escuelas_id') }}</strong>
			            </span>
		        	@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<button type="submit" class="btn btn-default">Guardar</button>
			</div>
		</div>
	{{Form::close()}}
@endsection