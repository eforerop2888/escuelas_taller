@extends('layouts.principal')
@section('title', 'DETALLE PROGRAMA')
@section('subtitle')
	{{$programa->nombre}}
@endsection
@section('content')
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
			<tr>
				<th>Escuela</th>
				<td>{{$programa->nombre_escuela}}</td>
			<tr/>
			<tr>
				<th>País</th>
				<td>{{ucfirst($programa->pais)}}</td>
			<tr/>
		</table>
	</div>
	<div class="row">
		<div class="col-md-12">
			{{ Form::open(['method' => 'Get', 'route' => ['programas.edit', $programa->id]]) }}
				<button type="submit" class="btn btn-primary">
					Editar Programa <i class="fa fa-edit" aria-hidden="true"></i>
				</button>
			{{ Form::close() }}
		</div>
	</div>
@endsection