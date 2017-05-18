@extends('layouts.principal')
@section('title', 'DETALLE ESCUELA')
@section('content')
	<h2>{{$escuela->nombre}}</h2>
	<div class="table-responsive">
		<table class="table table-hover">
			<tr>
				<th>Dirección</th>
				<td colspan="2">{{$escuela->direccion}}</td>
			</tr>
			<tr>
				<th>Teléfono</th>
				<td colspan="2">{{$escuela->telefono}}</td>
			<tr/>
			<tr>
				<th>Página Web</th>
				<td colspan="2">{{$escuela->pagina_web}}</td>
			<tr/>
			<tr>
				<th>Fecha Creación Escuela</th>
				<td colspan="2">{{$escuela->created_at}}</td>
			<tr/>
			<tr>
				<th>Acto Administrativo</th>
				<td colspan="2">{{$escuela->acto_administrativo}}</td>
			<tr/>
			<tr>
				<th>Otorgante Permiso</th>
				<td colspan="2">{{$escuela->otorga_permiso}}</td>
			<tr/>
			<tr>
				<th>Director | Coordinador</th>
				<td>{{$escuela->director}}</td>
				<td>{{$escuela->director_email}}</td>
			</tr>
			<tr>
				<th>Coordinador Academico</th>
				<td>{{$escuela->coordinador}}</td>
				<td>{{$escuela->coordinador_email}}</td>
			</tr>		
			<tr>
				<th>Coordinador Humano</th>
				<td>{{$escuela->coordinador_humano}}</td>
				<td>{{$escuela->coordinador_humano_email}}</td>
			</tr>
		</table>
	</div>
@endsection