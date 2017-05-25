@extends('layouts.principal')
@section('title', 'DETALLE COOPERANTE')
@section('subtitle')
	Cooperante: {{$cooperante->nombre_cooperante}}
@endsection
@section('content')
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
			<tr>
				<th>Programa</th>
				<td>{{$cooperante->nombre_programa}}</td>
			<tr/>
			<tr>
				<th>Pais</th>
				<td>{{ucfirst($cooperante->pais)}}</td>
			<tr/>
		</table>
	</div>
	<div class="row">
		<div class="col-md-12">
			{{ Form::open(['method' => 'Get', 'route' => ['cooperantes.edit', $cooperante->id]]) }}
				<button type="submit" class="btn btn-warning">
					<i class="fa fa-edit" aria-hidden="true"></i> Editar Cooperante
				</button>
			{{ Form::close() }}
		</div>
	</div>
@endsection