@extends('layouts.principal')
@section('title', 'Crear curso de extensión')
@section('subtitle', 'CURSOS DE EXTENSIÓN - CREAR')
@section('content')
	@if($escuelas->count())
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
					<div class="form-group {{ $errors->has('temas') ? ' has-error ' : ''}}">
						<label for="temas">Temas (Máximo 500 caracteres)</label>
						<textarea id="temas" name="temas" class="form-control" required maxlength="500">{{old('temas')}}</textarea>
						@if ($errors->has('temas'))
				            <span>
				              <strong>{{ $errors->first('temas') }}</strong>
				            </span>
				      	@endif
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group {{ $errors->has('duracion') ? ' has-error ' : ''}}">
						<label for="duracion">Duración del curso (Horas)</label>
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
						<label for="costo">Costo Aproximado (USD)</label>
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
						<label for="objetivo_curso">Objetivo del curso (Máximo 500 caracteres)</label>
						<textarea id="objetivo_curso" name="objetivo_curso" class="form-control" value="{{old('objetivo_curso')}}" required maxlength="500"></textarea>
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
		@else
			@include('layouts.msjNoEscuelas')
	@endif
@endsection