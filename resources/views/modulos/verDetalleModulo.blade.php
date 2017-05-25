@extends('layouts.principal')
@section('title', 'Detalle Módulo')
@section('subtitle')
	Modulo {{$modulo->nombre_modulo}}
@endsection
@section('content')
	<div class="table-responsive">
		<table class="table table-hover">
			<tr>
				<th>Duración (Meses)</th>
				<td>{{$modulo->duracion}}</td>
			</tr>
			<tr>
				<th>Tipo Modulo</th>
				<td>{{$modulo->tipo}}</td>
			<tr/>
			<tr>
				<th>Objetivo</th>
				<td>{{$modulo->objetivo}}</td>
			<tr/>
			<tr>
				<th>Nombre Maestro</th>
				<td>{{$modulo->nombre_maestro}}</td>
			<tr/>
			<tr>
				<th>Mail Maestro</th>
				<td>{{$modulo->mail_maestro}}</td>
			<tr/>
			<tr>
				<th>Experiencia Maestro</th>
				<td>{{$modulo->experiencia}}</td>
			<tr/>
			<tr>
				<th>Programa</th>
				<td>{{$modulo->nombre_programa}}</td>
			</tr>
		</table>
	</div>
	<div class="row">
		<div class="col-md-12">
			{{ Form::open(['method' => 'Get', 'route' => ['modulos.edit', $modulo->id_modulos]]) }}
				<input type="hidden" name="programa_id" id="programa_id" value="{{$modulo->id_programa}}">
				<button type="submit" class="btn btn-warning">
					<i class="fa fa-edit" aria-hidden="true"></i> Editar Modulo 
				</button>
			{{ Form::close() }}
		</div>
	</div>
@endsection