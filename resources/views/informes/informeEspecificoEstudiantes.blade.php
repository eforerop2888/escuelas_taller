@extends('layouts.principal')
@section('title', 'Informes')
@section('subtitle', 'Informe de Estudiantes')
@section('content')
	<div class="table-responsive">
		<table class="table table-hover">
			<tr>
				<th>#</th>
				<th>Escuela</th>
				<th>Hombres Blancos</th>
				<th>Mujeres Blancos</th>
				<th>Hombres Caucásicos</th>
				<th>Mujeres Caucásicos</th>
				<th>Hombres Afrodescendientes</th>
				<th>Mujeres Afrodescendientes</th>
				<th>Hombres Indígenas</th>
				<th>Mujeres Indígenas</th>
				<th>Hombres Mestizos</th>
				<th>Mujeres Mestizos</th>
				<th>Hombres Raizal (isleño)</th>
				<th>Mujeres Raizal (isleño)</th>
				<th>Hombres Rom (Gitano)</th>
				<th>Mujeres Rom (Gitano)</th>
				<th>Hombres Criollos</th>
				<th>Mujeres Criollas</th>
				<th>Hombres Amerindios</th>
				<th>Mujeres Amerindios</th>
				<th>Hombres Polinesios</th>
				<th>Mujeres Polinesios</th>
				<th>Hombres Melanesios</th>
				<th>Mujeres Melanesios</th>
				<th>Hombres Asiáticos</th>
				<th>Mujeres Asiáticos</th>
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
				<th>Hombres Egresados</th>
				<th>Mujeres Egresadas</th>
				<th>Hombres Estudiantes con trabajo</th>
				<th>Mujeres Estudiantes con trabajo</th>
				<th>Hombres Estudiantes con trabajo en otro oficio</th>
				<th>Mujeres Estudiantes con trabajo en otro oficio</th>
				<th>Hombres Estudiantes con trabajo en otro oficio</th>
				<th>Mujeres Estudiantes con trabajo en otro oficio</th>
				<th>Total Hombres</th>
				<th>Total Mujeres</th>
			</tr>
			@php ($i = 1)
			@foreach($estudiantes as $rowestudiantes)
				<tr>
					<td>{{$i}}</td>
					<td>{{$rowestudiantes->nombre_escuela}}</td>
					<td>{{$rowestudiantes->blanco_mujeres}}</td>
	                <td>{{$rowestudiantes->blanco_hombres}}</td>
	                <td>{{$rowestudiantes->caucasico_mujeres}}</td>
	                <td>{{$rowestudiantes->caucasico_hombres}}</td>
	                <td>{{$rowestudiantes->afrodescendiente_mujeres}}</td>
	                <td>{{$rowestudiantes->afrodescendiente_hombres}}</td>
	                <td>{{$rowestudiantes->indigena_mujeres}}</td>
	                <td>{{$rowestudiantes->indigena_hombres}}</td>
	                <td>{{$rowestudiantes->mestizo_mujeres}}</td>
	                <td>{{$rowestudiantes->mestizo_hombres}}</td>
	                <td>{{$rowestudiantes->raizal_isleno_mujeres}}</td>
	                <td>{{$rowestudiantes->raizal_isleno_hombres}}</td>
	                <td>{{$rowestudiantes->rom_gitano_mujeres}}</td>
	                <td>{{$rowestudiantes->rom_gitano_hombres}}</td>
	                <td>{{$rowestudiantes->criollo_mujeres}}</td>
	                <td>{{$rowestudiantes->criollo_hombres}}</td>
	                <td>{{$rowestudiantes->amerindio_mujeres}}</td>
	                <td>{{$rowestudiantes->amerindio_hombres}}</td>
	                <td>{{$rowestudiantes->polinesio_mujeres}}</td>
	                <td>{{$rowestudiantes->polinesio_hombres}}</td>
	                <td>{{$rowestudiantes->melanesio_mujeres}}</td>
	                <td>{{$rowestudiantes->melanesio_hombres}}</td>
	                <td>{{$rowestudiantes->asiatico_mujeres}}</td>
	                <td>{{$rowestudiantes->asiatico_hombres}}</td>
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
					<td>{{$rowestudiantes->egresados_programa_hombres}}</td>
					<td>{{$rowestudiantes->egresados_programa_mujeres}}</td>
					<td>{{$rowestudiantes->egresados_trabajo_hombres}}</td>
					<td>{{$rowestudiantes->egresados_trabajo_mujeres}}</td>
					<td>{{$rowestudiantes->egresados_trabajo_otro_hombres}}</td>
					<td>{{$rowestudiantes->egresados_trabajo_otro_mujeres}}</td>
					<td>{{$rowestudiantes->egresados_desempleados_hombres}}</td>
					<td>{{$rowestudiantes->egresados_desempleados_mujeres}}</td>
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
