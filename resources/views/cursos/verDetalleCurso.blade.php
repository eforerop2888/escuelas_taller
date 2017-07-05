@extends('layouts.principal')
@section('title', 'DETALLE CURSO')
@section('subtitle')
	{{$curso->nombre_curso}}
@endsection
@section('content')
	<div class="table-responsive">
		<table class="table table-hover">
			<tr>
				<th>Objetivo del curso</th>
				<td>{{$curso->objetivo_curso}}</td>
			</tr>
			<tr>
				<th>Duración (Horas)</th>
				<td>{{$curso->duracion}}</td>
			<tr/>
			<tr>
				<th>Costo Aproximado (USD)</th>
				<td>{{$curso->costo}}</td>
			<tr/>
			<tr>
				<th>Temas</th>
				<td>{{$curso->temas}}</td>
			<tr/>
			<tr>
				<th>Escuela</th>
				<td>{{ucfirst($curso->nombre_escuela)}}</td>
			<tr/>
		</table>
	</div>
	@if(Auth::user()->pais_id == $curso->pais_id)
		<div class="row">
			<div class="col-md-12">
				{{ Form::open(['method' => 'Get', 'route' => ['cursos.edit', $curso->id]]) }}
					<button type="submit" class="btn btn-warning">
						<i class="fa fa-edit" aria-hidden="true"></i> Editar Curso
					</button>
				{{ Form::close() }}
			</div>
		</div>
	@endif
@endsection