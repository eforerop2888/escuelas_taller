@extends('layouts.principal')
@section('title', 'DETALLE CURSO')
@section('subtitle')
	{{$curso->nombre}}
@endsection
@section('content')
	<div class="table-responsive">
		<table class="table table-hover">
			<tr>
				<th>Objetivo del curso</th>
				<td>{{$curso->objetivo_curso}}</td>
			</tr>
			<tr>
				<th>Duración</th>
				<td>{{$curso->duracion}}</td>
			<tr/>
			<tr>
				<th>Costo</th>
				<td>{{$curso->costo}}</td>
			<tr/>
			<tr>
				<th>Contacto</th>
				<td>{{$curso->contacto}}</td>
			<tr/>
			<tr>
				<th>Pais</th>
				<td>{{ucfirst($curso->pais)}}</td>
			<tr/>
		</table>
	</div>
	<div class="row">
		<div class="col-md-12">
			{{ Form::open(['method' => 'Get', 'route' => ['cursos.edit', $curso->id]]) }}
				<button type="submit" class="btn btn-warning">
					<i class="fa fa-edit" aria-hidden="true"></i> Editar Curso
				</button>
			{{ Form::close() }}
		</div>
	</div>
@endsection