@extends('layouts.principal')
@section('title', 'Editar curso de extensión')
@section('subtitle', 'EDITAR CURSO DE EXTENSIÓN')
@section('content')
	{{Form::open(['route' => ['cursos.update', $curso->id], 'method' => 'PUT', 'id' => 'form-editar-curso'])}}
		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('nombre_curso') ? ' has-error ' : ''}}">
					<label for="nombre_curso">Nombre del curso</label>
					<input type="text" id="nombre_curso" name="nombre_curso" class="form-control" required placeholder="Nombre del curso" autofocus value="{{$curso->nombre}}">
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
					<input type="text" id="contacto" name="contacto" class="form-control" required placeholder="Contacto" value="{{$curso->contacto}}">
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
					<input type="number" id="duracion" name="duracion" class="form-control" required placeholder="Duración del curso" value="{{$curso->duracion}}">
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
					<input type="number" id="costo" name="costo" class="form-control" required placeholder="Costo del curso" value="{{$curso->costo}}">
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
					<textarea id="objetivo_curso" name="objetivo_curso" class="form-control" required>{{$curso->objetivo_curso}}</textarea>
					@if ($errors->has('objetivo_curso'))
			            <span>
			              <strong>{{ $errors->first('objetivo_curso') }}</strong>
			            </span>
		        	@endif
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('pais_id') ? ' has-error ' : ''}}">
					<label for="pais_id">País</label>
					<select id="pais_id" name="pais_id" class="form-control" required>
						@foreach ($paises as $rowpaises)
							@if(Auth::user()->pais_id == $rowpaises->id)
								<option value="{{$rowpaises->id}}" selected>{{ucfirst($rowpaises->pais)}}</option>
							@else
								@if(Auth::user()->role_id == 1)
									<option value="{{$rowpaises->id}}">{{ucfirst($rowpaises->pais)}}</option>
								@endif
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
		</div>
		<div class="row">
			<div class="col-md-12">
				<button type="submit" class="btn btn-primary">Guardar</button>
			</div>
		</div>
	{{Form::close()}}
@endsection