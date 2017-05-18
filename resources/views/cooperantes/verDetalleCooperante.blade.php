@extends('layouts.principal')
@section('title', 'DETALLE COOPERANTE')
@section('content')
	<h2>{{$cooperante->nombre}}</h2>
	<div class="table-responsive">
		<table class="table table-hover">
			<tr>
				<th>Nombre del cooperante</th>
				<td>{{$cooperante->objetivo_curso}}</td>
			</tr>
			<tr>
				<th>Mail del contacto</th>
				<td>{{$cooperante->duracion}}</td>
			<tr/>
			<tr>
				<th>Persona de contacto</th>
				<td>{{$cooperante->costo}}</td>
			<tr/>
			<tr>
				<th>Programa en el que coopera</th>
				<td>{{$cooperante->contacto}}</td>
			<tr/>
			<tr>
				<th>Tipo de cooperación</th>
				<td>{{$cooperante->contacto}}</td>
			<tr/>
			<tr>
				<th>Resultados más significativos</th>
				<td>{{$cooperante->contacto}}</td>
			<tr/>
		</table>
	</div>
@endsection