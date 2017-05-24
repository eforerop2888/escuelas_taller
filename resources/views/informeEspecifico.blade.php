@extends('layouts.principal')
@section('title', 'Informes')
@section('subtitle')
	@if($programas->count())
		Informe de Programas
	@endif
	@if( !empty($estudiantes_mujeres) && !empty($estudiantes_hombres))
		Informe de Estudiantes
	@endif
@endsection
@section('content')
	@if($programas->count())
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
	@endif
	@if( !empty($estudiantes_mujeres) && !empty($estudiantes_hombres))
		<div class="table-responsive">
			<table class="table table-hover">
				<tr>
					<th></th>
					<th>Mujeres</th>
					<th>Hombres</th>
				</tr>
				<tr>
					<th>Etnia</th>
					<td>{{$estudiantes_mujeres->etnia}}</td>
					<td>{{$estudiantes_hombres->etnia}}</td>
				</tr>
				<tr>
					<th>Victimas</th>
					<td>{{$estudiantes_mujeres->victimas}}</td>
					<td>{{$estudiantes_hombres->victimas}}</td>
				<tr/>
				<tr>
					<th>Excombatientes</th>
					<td>{{$estudiantes_mujeres->excombatientes}}</td>
					<td>{{$estudiantes_hombres->excombatientes}}</td>
				<tr/>
				<tr>
					<th>Desplazados</th>
					<td>{{$estudiantes_mujeres->desplazados}}</td>
					<td>{{$estudiantes_hombres->desplazados}}</td>
				<tr/>
				<tr>
					<th>Pobreza</th>
					<td>{{$estudiantes_mujeres->pobreza}}</td>
					<td>{{$estudiantes_hombres->pobreza}}</td>
				<tr/>
				<tr>
					<th>Estudiantes Certificados</th>
					<td>{{$estudiantes_mujeres->certificados}}</td>
					<td>{{$estudiantes_hombres->certificados}}</td>
				<tr/>
				<tr>
					<th>Total</th>
					<td>{{$estudiantes_mujeres_t->sumaTotal}}</td>
					<td>{{$estudiantes_hombres_t->sumaTotal}}</td>
				</tr>
			</table>
		</div>
	@endif
@endsection
