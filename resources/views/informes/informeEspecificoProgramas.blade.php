@extends('layouts.principal')
@section('title', 'Informes')
@section('subtitle', 'Informe de Programas')
@section('content')
	<table class="table table-hover">
		<tr>
			<th>#</th>
			<th>Nombre</th>
			<th>Duración (meses)</th>
			<th>Duración (horas)</th>
			<th>Duración Practicas (horas)</th>
			<th>Objetivo</th>
			<th>Requisitos Ingreso</th>
			<th>Trabajo Egresados</th>
			<th>Escuela</th>
			<th>País</th>
		</tr>
		@php ($i = 1)
		@foreach($programas as $rowprogramas)
			<tr>
				<td>{{$i}}</td>
				<td>{{$rowprogramas->nombre}}</td>
				<td>{{$rowprogramas->duracion_meses}}</td>
				<td>{{$rowprogramas->duracion_horas}}</td>
				<td>{{$rowprogramas->duracion_practicas_horas}}</td>
				<td>{{$rowprogramas->objetivo_programa}}</td>
				<td>{{ucfirst($rowprogramas->requisitos_ingreso)}}</td>
				<td>{{ucfirst($rowprogramas->trabajo_egresados)}}</td>
				<td>{{ucfirst($rowprogramas->nombre_escuela)}}</td>
				<td>{{ucfirst($rowprogramas->pais)}}</td>
			</tr>
		@php ($i++)
		@endforeach
	</table>
	<div class="row">
		<div class="col-md-12">
			{{ Form::open(['method' => 'Post', 'route' => 'informes.exportarinforme']) }}
				<input type="hidden" name="escuela" id="escuela" value="{{$escuela}}">
				<input type="hidden" name="tipo_informe" id="tipo_informe" value="4">
				<button type="submit" class="btn btn-primary">
					<i class="fa fa-file-excel-o" aria-hidden="true"></i>
					Exportar a excel
				</button>
			{{ Form::close() }}
		</div>
	</div>
@endsection
