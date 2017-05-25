@extends('layouts.principal')
@section('title', 'DETALLE ESCUELA')
@section('subtitle')
	{{$escuela->nombre}}
@endsection
@section('content')
	<div class="table-responsive">
		<table class="table table-hover">
			<tr>
				<th>País</th>
				<td colspan="2">{{ucfirst($escuela->pais)}}</td>
			</tr>
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
	<div class="row">
		<div class="col-md-6 col-xs-6">
			{{ Form::open(['method' => 'Get', 'route' => ['escuelas.edit', $escuela->id]]) }}
				<button type="submit" class="btn btn-warning">
					<i class="fa fa-edit" aria-hidden="true"></i> Editar Escuela
				</button>
			{{ Form::close() }}
		</div>
		<div class="col-md-6 col-xs-6">
			{{ Form::open(['method' => 'Get', 'route' => ['programas.create']]) }}
				<input type="hidden" name="escuela" value="{{$escuela->id}}">
				<button type="submit" class="btn btn-primary">
					<i class="fa fa-pencil" aria-hidden="true"></i> Crear Programa
				</button>
			{{ Form::close() }}
		</div>
	</div>
@endsection