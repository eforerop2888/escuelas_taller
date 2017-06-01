@extends('layouts.principal')
@section('title', 'Listado Escuelas')
@section('subtitle')
	LISTADO DE ESCUELAS {{strtoupper($pais->pais)}}
@endsection
@section('content')
	@if ($escuelas->count())
		<table class="table table-hover">
			<tr>
				<th>#</th>
				<th>Nombre</th>
				<th>Dirección</th>
				<th>Teléfono</th>
				<th>Director</th>
				<th>País</th>
				<th>Ver</th>
				@if (Auth::user()->role_id == 1)
					<th>Eliminar</th>
				@endif
			</tr>
			@php ($i = 1)
			@foreach($escuelas as $rowescuelas)
				<tr>
					<td>{{$i}}</td>
					<td>{{$rowescuelas->nombre}}</td>
					<td>{{$rowescuelas->direccion}}</td>
					<td>{{$rowescuelas->telefono}}</td>
					<td>{{$rowescuelas->director}}</td>
					<td>{{ucfirst($rowescuelas->pais)}}</td>
					<td>
						{{ Form::open(['method' => 'Get', 'route' => ['escuelas.show', $rowescuelas->id]]) }}
							<button type="submit" class="btn btn-success">
								<i class="fa fa-eye" aria-hidden="true"></i>
							</button>
						{{ Form::close() }}
					</td>
					@if (Auth::user()->role_id == 1)
					<td>
						{{ Form::open(['method' => 'Delete', 'route' => ['escuelas.destroy', $rowescuelas->id], 'class' => 'form-eliminar']) }}
							<button type="submit" class="btn btn-danger">
								<i class="fa fa-eraser" aria-hidden="true"></i>
							</button>
						{{ Form::close() }}
					</td>
					@endif
				</tr>
			@php ($i++)
			@endforeach
		</table>
		@else
			@include('layouts.msjNoRegistros')
	@endif
@endsection