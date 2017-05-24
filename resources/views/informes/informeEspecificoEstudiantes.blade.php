@extends('layouts.principal')
@section('title', 'Informes')
@section('subtitle', 'Informe de Estudiantes')
@section('content')
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
@endsection
