@extends('layouts.principal')
@section('title', 'Ver Cooperantes')
@section('subtitle', 'LISTADO DE COOPERANTES')
@section('content')
	<table class="table table-hover">
		<tr>
			<th>#</th>
			<th>Nombre</th>
			<th>Persona contacto</th>
			<th>Mail del contacto</th>
			<th>Ver</th>
			<th>Eliminar</th>
		</tr>
		@php ($i = 1)
		@foreach($cooperantes as $rowcooperantes)
			<tr>
				<td>{{$i}}</td>
				<td>{{$rowcooperantes->nombre}}</td>
				<td>{{$rowcooperantes->persona_contacto}}</td>
				<td>{{$rowcooperantes->mail_contacto}}</td>
				<td>
					{{ Form::open(['method' => 'Get', 'route' => ['cooperantes.show', $rowcooperantes->id]]) }}
						<button type="submit">
							<i class="fa fa-eye" aria-hidden="true"></i>
						</button>
					{{ Form::close() }}
				</td>
				<td>
					{{ Form::open(['method' => 'Delete', 'route' => ['cooperantes.destroy', $rowcooperantes->id]]) }}
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