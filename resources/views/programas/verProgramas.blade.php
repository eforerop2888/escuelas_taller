@extends('layouts.principal')
@section('title', 'Ver Programas')
@section('subtitle')
LISTADO DE PROGRAMAS {{strtoupper($pais->pais)}}
@endsection
@section('content')
	@if($programas->count())
		<table class="table table-hover">
			<tr>
				<th>#</th>
				<th>Nombre</th>
				<th>Duración (meses)</th>
				<th>Duración en total (horas)</th>
				<th>Duración Practicas (horas)</th>
				<th>Escuela</th>
				<th>País</th>
				<th>Estado</th>
				<th>Ver</th>
				@if(Auth::user()->role_id == 1)
					<th>Eliminar</th>
				@endif
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
					<td>{{ucfirst($rowprogramas->estado)}}</td>
					<td>
						{{ Form::open(['method' => 'Get', 'route' => ['programas.show', $rowprogramas->id]]) }}
							<button type="submit" class="btn btn-success">
								<i class="fa fa-eye" aria-hidden="true"></i>
							</button>
						{{ Form::close() }}
					</td>
					@if(Auth::user()->role_id == 1)
						<td>
							{{ Form::open(['method' => 'Delete', 'route' => ['programas.destroy', $rowprogramas->id], 'class' => 'form-eliminar']) }}
								<button type="submit" class="btn btn-danger">
									<i class="fa fa-eraser" aria-hidden="true" alt="borrar"></i>
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