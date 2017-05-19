@extends('layouts.principal')
@section('title', 'DETALLE COOPERANTE')
@section('content')
	<h2>{{$cooperante->nombre_cooperante}}</h2>
	<div class="table-responsive">
		<table class="table table-hover">
			<tr>
				<th>Mail del contacto</th>
				<td>{{$cooperante->mail_contacto}}</td>
			<tr/>
			<tr>
				<th>Persona de contacto</th>
				<td>{{$cooperante->persona_contacto}}</td>
			<tr/>
			<tr>
				<th>Programa en el que coopera</th>
				<td>{{$cooperante->nombre_programa}}</td>
			<tr/>
			<tr>
				<th>Tipo de cooperación</th>
				<td>{{$cooperante->tipo_cooperacion}}</td>
			<tr/>
			<tr>
				<th>Resultados más significativos</th>
				<td>{{$cooperante->resultados_significativos}}</td>
			<tr/>
		</table>
	</div>
	<div class="row">
		<div class="col-md-12">
			{{ Form::open(['method' => 'Get', 'route' => ['cooperantes.edit', $cooperante->id]]) }}
				<button type="submit">
					Editar Escuela <i class="fa fa-edit" aria-hidden="true"></i>
				</button>
			{{ Form::close() }}
		</div>
	</div>
@endsection