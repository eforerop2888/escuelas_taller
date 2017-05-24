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
				<td>{{$rowcooperantes->nombre_programa}}</td>
				<td>{{ucfirst($rowcooperantes->pais)}}</td>
			</tr>
		@php ($i++)
		@endforeach
	</table>
@endsection
