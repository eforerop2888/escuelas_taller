@extends('layouts.principal')
@section('title', 'DETALLE CURSO')
@section('content')
	<h2>{{$curso->nombre}}</h2>
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
		</table>
	</div>
@endsection