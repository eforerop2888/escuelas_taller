@extends('layouts.principal')
@section('title', 'Ver Programas')
@section('subtitle', 'LISTADO DE PROGRAMAS')
@section('content')
	<table class="table table-hover">
		<tr>
			<th>#</th>
			<th>Nombre</th>
			<th>Duración (meses)</th>
			<th>Duración (horas)</th>
			<th>Duración Practicas (horas)</th>
			<th>Escuela</th>
			<th>País</th>
			<th>Ver</th>
			<th>Eliminar</th>
		</tr>
		@php ($i = 1)
		@foreach($programas as $rowprogramas)
			<tr>
				<td>{{$i}}</td>
				<td>{{$rowprogramas->nombre}}</td>
				<td>{{$rowprogramas->duracion_meses}}</td>
				<td>{{$rowprogramas->duracion_horas}}</td>
				<td>{{$rowprogramas->duracion_practicas_horas}}</td>
				<td>{{ucfirst($rowprogramas->nombre_escuela)}}</td>
				<td>{{ucfirst($rowprogramas->pais)}}</td>
				<td>
					{{ Form::open(['method' => 'Get', 'route' => ['programas.show', $rowprogramas->id]]) }}
						<button type="submit" class="btn btn-success">
							<i class="fa fa-eye" aria-hidden="true"></i>
						</button>
					{{ Form::close() }}
				</td>
				<td>
					{{ Form::open(['method' => 'Delete', 'route' => ['programas.destroy', $rowprogramas->id]]) }}
						<button type="submit" class="btn btn-danger">
							<i class="fa fa-eraser" aria-hidden="true" alt="borrar"></i>
						</button>
					{{ Form::close() }}
				</td>
			</tr>
		@php ($i++)
		@endforeach
	</table>
@endsection