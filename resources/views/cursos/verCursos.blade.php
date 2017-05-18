@extends('layouts.principal')
@section('title', 'Listado cursos')
@section('subtitle', 'LISTADO DE CURSOS DE EXTENSION')
@section('content')
	<table class="table table-hover">
		<tr>
			<th>#</th>
			<th>Nombre</th>
			<th>Duración (meses)</th>
			<th>Duración (horas)</th>
			<th>Duración Practicas (horas)</th>
			<th>Ver</th>
			<th>Eliminar</th>
		</tr>
		@php ($i = 1)
		@foreach($cursosExtension as $rowcursosExtension)
			<tr>
				<td>{{$i}}</td>
				<td>{{$rowcursosExtension->nombre}}</td>
				<td>{{$rowcursosExtension->duracion}}</td>
				<td>{{$rowcursosExtension->costo}}</td>
				<td>{{$rowcursosExtension->contacto}}</td>
				<td>
					{{ Form::open(['method' => 'Get', 'route' => ['cursos.edit', $rowcursosExtension->id]]) }}
						<button type="submit">
							<i class="fa fa-eye" aria-hidden="true"></i>
						</button>
					{{ Form::close() }}
				</td>
				</td>
				<td>
					{{ Form::open(['method' => 'Delete', 'route' => ['cursos.destroy', $rowcursosExtension->id]]) }}
						<button type="submit">
							<i class="fa fa-eraser" aria-hidden="true" alt="borrar"></i>
						</button>
					{{ Form::close() }}
				</td>
			</tr>
		@php ($i++)
		@endforeach
	</table>
@endsection