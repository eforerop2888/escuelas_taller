@extends('layouts.principal')
@section('title', 'Ver Usuarios')
@section('subtitle', 'LISTADO DE USUARIOS')
@section('content')
	@if($usuarios->count())
		<table class="table table-hover">
			<tr>
				<th>#</th>
				<th>Nombre</th>
				<th>Email</th>
				<th>País</th>
				<th>Rol</th>
				<th>Ver</th>
				@if(Auth::user()->role_id == 1)
					<th>Eliminar</th>
				@endif
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
						{{ Form::open(['method' => 'Get', 'route' => ['usuarios.show', $rowusuarios->id_users]]) }}
							<button type="submit" class="btn btn-success">
								<i class="fa fa-eye" aria-hidden="true"></i>
							</button>
						{{ Form::close() }}
					</td>
					@if(Auth::user()->role_id == 1)
						<td>
							{{ Form::open(['method' => 'Delete', 'route' => ['usuarios.destroy', $rowusuarios->id_users], 'class' => 'form-eliminar']) }}
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