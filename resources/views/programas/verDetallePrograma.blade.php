@extends('layouts.principal')
@section('title', 'DETALLE PROGRAMA')
@section('content')
	<h2>{{$programa->nombre}}</h2>
	<div class="table-responsive">
		<table class="table table-hover">
			<tr>
				<th>Duración (Meses)</th>
				<td>{{$programa->duracion_meses}}</td>
			</tr>
			<tr>
				<th>Duración (Horas)</th>
				<td>{{$programa->duracion_horas}}</td>
			<tr/>
			<tr>
				<th>Duración practica (Horas)</th>
				<td>{{$programa->duracion_practicas_horas}}</td>
			<tr/>
			<tr>
				<th>Objetivo del Programa</th>
				<td>{{$programa->objetivo_programa}}</td>
			<tr/>
			<tr>
				<th>Requisitos de ingreso</th>
				<td>{{$programa->requisitos_ingreso}}</td>
			<tr/>
			<tr>
				<th>Lugar de trabajo de los egresados</th>
				<td>{{$programa->trabajo_egresados}}</td>
			<tr/>
		</table>
	</div>
@endsection