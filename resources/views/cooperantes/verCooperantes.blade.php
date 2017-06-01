@extends('layouts.principal')
@section('title', 'Ver Cooperantes')
@section('subtitle')
	LISTADO DE COOPERANTES {{strtoupper($pais->pais)}}
@endsection
@section('content')
	@if($cooperantes->count())
		<table class="table table-hover">
			<tr>
				<th>#</th>
				<th>Nombre</th>
				<th>Persona contacto</th>
				<th>Mail del contacto</th>
				<th>Programa</th>
				<th>País</th>
				<th>Ver</th>
				@if(Auth::user()->role_id == 1)
					<th>Eliminar</th>
				@endif
			</tr>
			@php ($i = 1)
			@foreach($cooperantes as $rowcooperantes)
				<tr>
					<td>{{$i}}</td>
					<td>{{$rowcooperantes->nombre}}</td>
					<td>{{$rowcooperantes->persona_contacto}}</td>
					<td>{{$rowcooperantes->mail_contacto}}</td>
					<td>{{$rowcooperantes->nombre_programa}}</td>
					<td>{{ucfirst($rowcooperantes->pais)}}</td>
					<td>
						{{ Form::open(['method' => 'Get', 'route' => ['cooperantes.show', $rowcooperantes->id]]) }}
							<button type="submit" class="btn btn-success">
								<i class="fa fa-eye" aria-hidden="true"></i>
							</button>
						{{ Form::close() }}
					</td>
					@if(Auth::user()->role_id == 1)
						<td>
							{{ Form::open(['method' => 'Delete', 'route' => ['cooperantes.destroy', $rowcooperantes->id], 'class' => 'form-eliminar']) }}
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