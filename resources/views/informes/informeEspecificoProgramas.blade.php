@extends('layouts.principal')
@section('title', 'Informes')
@section('subtitle', 'Informe de Programas')
@endsection
@section('content')
	<table class="table table-hover">
		<tr>
			<th>#</th>
			<th>Nombre</th>
			<th>Duración (meses)</th>
			<th>Duración (horas)</th>
			<th>Duración Practicas (horas)</th>
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
				<td>{{ucfirst($rowprogramas->nombre_escuela)}}</td>
				<td>{{ucfirst($rowprogramas->pais)}}</td>
			</tr>
		@php ($i++)
		@endforeach
	</table>
@endsection
