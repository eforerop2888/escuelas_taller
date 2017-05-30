@extends('layouts.principal')
@section('title', 'DETALLE USUARIO')
@section('subtitle')
	Detalle usuario {{$usuario->name}}
@endsection
@section('content')
	<div class="table-responsive">
		<table class="table table-hover">
			<tr>
				<th>Email</th>
				<td>{{$usuario->email}}</td>
			</tr>
			<tr>
				<th>País</th>
				<td>{{$usuario->pais}}</td>
			<tr/>
			<tr>
				<th>Rol</th>
				<td>{{$usuario->role}}</td>
			<tr/>
		</table>
	</div>
	<div class="row">
		<div class="col-md-12">
			{{ Form::open(['method' => 'Get', 'route' => ['usuarios.edit', $usuario->user_id]]) }}
				<button type="submit" class="btn btn-warning">
					<i class="fa fa-edit" aria-hidden="true"></i> Editar Usuario
				</button>
			{{ Form::close() }}
		</div>
	</div>
@endsection