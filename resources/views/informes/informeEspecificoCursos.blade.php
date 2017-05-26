@extends('layouts.principal')
@section('title', 'Informes')
@section('subtitle', 'Informe de cursos')
@section('content')
	<div class="table-responsive">
		<table class="table table-hover">
			<tr>
				<th>#</th>
				<th>Nombre</th>
				<th>Duración</th>
				<th>Costo</th>
				<th>Contacto</th>
				<th>Escuela</th>
			</tr>
			@php ($i = 1)
			@foreach($cursos as $rowcursos)
				<tr>
					<td>{{$i}}</td>
					<td>{{$rowcursos->nombre_escuela}}</td>
					<td>{{$rowcursos->duracion}}</td>
					<td>{{$rowcursos->costo}}</td>
					<td>{{$rowcursos->contacto}}</td>
					<td>{{$rowcursos->nombre_escuela}}</td>
				</tr>
			@php ($i++)
			@endforeach
		</table>
	</div>
	<div class="row">
		<div class="col-md-12">
			{{ Form::open(['method' => 'Post', 'route' => 'informes.exportarinforme']) }}
				<input type="hidden" name="escuela" id="escuela" value="{{$escuela}}">
				<input type="hidden" name="tipo_informe" id="tipo_informe" value="2">
				<button type="submit" class="btn btn-primary">
					<i class="fa fa-file-excel-o" aria-hidden="true"></i>
					Exportar a excel
				</button>
			{{ Form::close() }}
		</div>
	</div>
@endsection
