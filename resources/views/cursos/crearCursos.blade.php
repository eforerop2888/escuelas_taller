@extends('layouts.principal')
@section('title', 'Crear curso de extensión')
@section('subtitle', 'CREAR CURSO DE EXTENSIÓN')
@section('content')
	{{Form::open(['route' => 'cursos.store', 'method' => 'POST', 'id' => 'form-crear-curso'])}}
		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('nombre_curso') ? ' has-error ' : ''}}">
					<label for="nombre_curso">Nombre del curso</label>
					<input type="text" id="nombre_curso" name="nombre_curso" class="form-control" value="{{old('nombre_curso')}}" required placeholder="Nombre del curso" autofocus>
					@if ($errors->has('nombre_curso'))
			            <span>
			              <strong>{{ $errors->first('nombre_curso') }}</strong>
			            </span>
		        	@endif
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('contacto') ? ' has-error ' : ''}}">
					<label for="contacto">Contacto</label>
					<input type="text" id="contacto" name="contacto" class="form-control" value="{{old('contacto')}}" required placeholder="Contacto">
					@if ($errors->has('contacto'))
			            <span>
			              <strong>{{ $errors->first('contacto') }}</strong>
			            </span>
			      	@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('duracion') ? ' has-error ' : ''}}">
					<label for="duracion">Duración del curso</label>
					<input type="number" id="duracion" name="duracion" class="form-control" value="{{old('duracion')}}" required placeholder="Duración del curso">
					@if ($errors->has('duracion'))
			            <span>
			              <strong>{{ $errors->first('duracion') }}</strong>
			            </span>
		        	@endif
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('costo') ? ' has-error ' : ''}}">
					<label for="costo">Costo del curso</label>
					<input type="number" id="costo" name="costo" class="form-control" value="{{old('costo')}}" required placeholder="Costo del curso">
					@if ($errors->has('costo'))
			          <span>
			            <strong>{{ $errors->first('costo') }}</strong>
			          </span>
			      	@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('objetivo_curso') ? ' has-error ' : ''}}">
					<label for="objetivo_curso">Objetivo del curso</label>
					<textarea id="objetivo_curso" name="objetivo_curso" class="form-control" value="{{old('objetivo_curso')}}" required></textarea>
					@if ($errors->has('objetivo_curso'))
			            <span>
			              <strong>{{ $errors->first('objetivo_curso') }}</strong>
			            </span>
		        	@endif
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('escuela_id') ? ' has-error ' : ''}}">
					<label for="escuela_id">Escuela</label>
					<select id="escuela_id" name="escuela_id" class="form-control" required>
						@foreach ($escuelas as $rowescuelas)
							<option value="{{$rowescuelas->id}}" selected>{{ucfirst($rowescuelas->nombre)}}</option>
						@endforeach
					</select>
					@if ($errors->has('escuela_id'))
			          <span>
			            <strong>{{ $errors->first('escuela_id') }}</strong>
			          </span>
			      	@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<button type="submit" class="btn btn-primary">
					<i class="fa fa-floppy-o" aria-hidden="true"></i>
					Guardar
				</button>
			</div>
		</div>
	{{Form::close()}}
@endsection