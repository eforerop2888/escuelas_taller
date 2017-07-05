@extends('layouts.principal')
@section('title', 'Cargar Reporte')
@section('subtitle', 'CARGAR REPORTE')
@section('content')
	{{Form::open(['route' => 'reportes.store', 'method' => 'POST', 'id' => 'form-crear-reporte', 'enctype' => "multipart/form-data"])}}
		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('ruta') ? ' has-error ' : ''}}">
					<label for="ruta">Archivo</label>
					<input type="file" name="ruta" id="ruta" required>
					@if ($errors->has('ruta'))
			            <span>
			              <strong>{{ $errors->first('ruta') }}</strong>
			            </span>
		        	@endif
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('nombre_archivo') ? ' has-error ' : ''}}">
					<label for="nombre_archivo">Nombre Reporte</label>
					<input type="text" id="nombre_archivo" name="nombre_archivo" class="form-control" value="{{old('nombre_archivo')}}" required placeholder="Nombre reporte" autofocus>
					@if ($errors->has('nombre_archivo'))
			            <span>
			              <strong>{{ $errors->first('nombre_archivo') }}</strong>
			            </span>
		        	@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
			</div>
		</div>
	{{Form::close()}}
@endsection
6