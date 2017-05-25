@extends('layouts.principal')
@section('title', 'Informes')
@section('subtitle', 'Informe de Cooperantes')
@section('content')
	<table class="table table-hover">
		<tr>
			<th>#</th>
			<th>Nombre</th>
			<th>Persona contacto</th>
			<th>Mail del contacto</th>
			<th>Tipo de Cooperación</th>
			<th>Resultados Significativos</th>
			<th>Programa</th>
			<th>País</th>
		</tr>
		@php ($i = 1)
		@foreach($cooperantes as $rowcooperantes)
			<tr>
				<td>{{$i}}</td>
				<td>{{$rowcooperantes->nombre}}</td>
				<td>{{$rowcooperantes->persona_contacto}}</td>
				<td>{{$rowcooperantes->mail_contacto}}</td>
				<td>{{$rowcooperantes->tipo_cooperacion}}</td>
				<td>{{$rowcooperantes->resultados_significativos}}</td>
				<td>{{$rowcooperantes->nombre_programa}}</td>
				<td>{{ucfirst($rowcooperantes->pais)}}</td>
			</tr>
		@php ($i++)
		@endforeach
	</table>
	<div class="row">
		<div class="col-md-12">
			{{ Form::open(['method' => 'Post', 'route' => 'informes.exportarinforme']) }}
				<input type="hidden" name="escuela" id="escuela" value="{{$escuela}}">
				<input type="hidden" name="tipo_informe" id="tipo_informe" value="1">
				<button type="submit" class="btn btn-primary">
					Exportar a excel <i class="fa fa-edit" aria-hidden="true"></i>
				</button>
			{{ Form::close() }}
		</div>
	</div>
@endsection
