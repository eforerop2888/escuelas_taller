@extends('layouts.principal')
@section('title', 'Listado cursos')
@section('subtitle', 'LISTADO DE CURSOS DE EXTENSION')
@section('content')
	@if($cursosExtension->count())
		<table class="table table-hover">
			<tr>
				<th>#</th>
				<th>Nombre</th>
				<th>Duración (Horas)</th>
				<th>Costo Aproximado (USD)</th>
				<th>Escuela</th>
				<th>Ver</th>
				@if(Auth::user()->role_id == 1)
					<th>Eliminar</th>
				@endif
			</tr>
			@php ($i = 1)
			@foreach($cursosExtension as $rowcursosExtension)
				<tr>
					<td>{{$i}}</td>
					<td>{{ucfirst($rowcursosExtension->nombre_curso)}}</td>
					<td>{{$rowcursosExtension->duracion}}</td>
					<td>{{$rowcursosExtension->costo}}</td>
					<td>{{ucfirst($rowcursosExtension->nombre_escuela)}}</td>
					<td>
						{{ Form::open(['method' => 'Get', 'route' => ['cursos.show', $rowcursosExtension->id]]) }}
							<button type="submit" class="btn btn-success">
								<i class="fa fa-eye" aria-hidden="true"></i>
							</button>
						{{ Form::close() }}
					</td>
					</td>
					@if(Auth::user()->role_id == 1)
						<td>
							{{ Form::open(['method' => 'Delete', 'route' => ['cursos.destroy', $rowcursosExtension->id], 'class' => 'form-eliminar']) }}
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