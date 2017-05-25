@extends('layouts.principal')
@section('title', 'Ver Usuarios')
@section('subtitle', 'LISTADO DE USUARIOS')
@section('content')
	<table class="table table-hover">
		<tr>
			<th>#</th>
			<th>Nombre</th>
			<th>Email</th>
			<th>País</th>
			<th>Rol</th>
			<th>Eliminar</th>
		</tr>
		@php ($i = 1)
		@foreach($usuarios as $rowusuarios)
			<tr>
				<td>{{$i}}</td>
				<td>{{ucfirst($rowusuarios->name)}}</td>
				<td>{{$rowusuarios->email}}</td>
				<td>{{ucfirst($rowusuarios->pais)}}</td>
				<td>{{ucfirst($rowusuarios->role)}}</td>
				<td>
					{{ Form::open(['method' => 'Delete', 'route' => ['usuarios.destroy', $rowusuarios->id_users]]) }}
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