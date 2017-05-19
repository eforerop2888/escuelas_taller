@extends('layouts.principal')
@section('title', 'Listado Escuelas')
@section('subtitle', 'LISTADO DE ESCUELAS')
@section('content')
	<table class="table table-hover">
		<tr>
			<th>#</th>
			<th>Nombre</th>
			<th>Dirección</th>
			<th>Teléfono</th>
			<th>Director</th>
			<th>Ver</th>
			<th>Eliminar</th>
		</tr>
		@php ($i = 1)
		@foreach($escuelas as $rowescuelas)
			<tr>
				<td>{{$i}}</td>
				<td>{{$rowescuelas->nombre}}</td>
				<td>{{$rowescuelas->direccion}}</td>
				<td>{{$rowescuelas->telefono}}</td>
				<td>{{$rowescuelas->director}}</td>
				<td>
					{{ Form::open(['method' => 'Get', 'route' => ['escuelas.show', $rowescuelas->id]]) }}
						<button type="submit">
							<i class="fa fa-eye" aria-hidden="true"></i>
						</button>
					{{ Form::close() }}
				</td>
				<td>
					{{ Form::open(['method' => 'Delete', 'route' => ['escuelas.destroy', $rowescuelas->id]]) }}
						<button type="submit">
							<i class="fa fa-eraser" aria-hidden="true"></i>
						</button>
					{{ Form::close() }}
				</td>
			</tr>
		@php ($i++)
		@endforeach
	</table>
@endsection