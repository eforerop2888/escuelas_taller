@extends('layouts.principal')
@section('title', 'Informes')
@section('subtitle', 'Informe de Estudiantes')
@section('content')
	<div class="table-responsive">
		<table class="table table-hover">
			<tr>
				<th>#</th>
				<th>Escuela</th>
				<th>Mujeres de Etnia </th>
				<th>Hombres de Etnia </th>
				<th>Victimas Hombres</th>
				<th>Victimas Mujeres</th>
				<th>Hombres Excombatientes</th>
				<th>Mujeres Excombatientes</th>
				<th>Hombres Desplazados</th>
				<th>Mujeres Desplazadas </th>
				<th>Pobreza Hombres</th>
				<th>Pobreza Mujeres</th>
				<th>Hombres Certificados</th>
				<th>Mujeres Certificadas</th>
				<th>Total Hombres</th>
				<th>Total Mujeres</th>
			</tr>
			@php ($i = 1)
			@foreach($estudiantes as $rowestudiantes)
				<tr>
					<td>{{$i}}</td>
					<td>{{$rowestudiantes->nombre_escuela}}</td>
					<td>{{$rowestudiantes->etnia_mujeres}}</td>
					<td>{{$rowestudiantes->etnia_hombres}}</td>
					<td>{{$rowestudiantes->victimas_hombres}}</td>
					<td>{{$rowestudiantes->victimas_mujeres}}</td>
					<td>{{$rowestudiantes->excombatientes_hombres}}</td>
					<td>{{$rowestudiantes->excombatientes_mujeres}}</td>
					<td>{{$rowestudiantes->desplazados_hombres}}</td>
					<td>{{$rowestudiantes->desplazados_mujeres}}</td>
					<td>{{$rowestudiantes->pobreza_hombres}}</td>
					<td>{{$rowestudiantes->pobreza_mujeres}}</td>
					<td>{{$rowestudiantes->certificados_hombres}}</td>
					<td>{{$rowestudiantes->certificados_mujeres}}</td>
					<td>{{$rowestudiantes->total_hombres}}</td>
					<td>{{$rowestudiantes->total_mujeres}}</td>
				</tr>
			@php ($i++)
			@endforeach
		</table>
	</div>
	<div class="row">
		<div class="col-md-12">
			{{ Form::open(['method' => 'Post', 'route' => 'informes.exportarinforme']) }}
				<input type="hidden" name="pais" id="pais" value="{{$pais}}">
				<input type="hidden" name="tipo_informe" id="tipo_informe" value="3">
				<button type="submit" class="btn btn-primary">
					<i class="fa fa-file-excel-o" aria-hidden="true"></i>
					Exportar a excel
				</button>
			{{ Form::close() }}
		</div>
	</div>
@endsection
