@extends('layouts.principal')
@section('title', 'Detalle Programa')
@section('subtitle')
	{{$programa->nombre}}
@endsection
@section('content')
	<div class="table-responsive">
		<table class="table table-hover">
			<tr>
				<th>Duración (Meses)</th>
				<td>{{$programa->duracion_meses}}</td>
			</tr>
			<tr>
				<th>Duración (Horas)</th>
				<td>{{$programa->duracion_horas}}</td>
			<tr/>
			<tr>
				<th>Duración practica (Horas)</th>
				<td>{{$programa->duracion_practicas_horas}}</td>
			<tr/>
			<tr>
				<th>Objetivo del Programa</th>
				<td>{{$programa->objetivo_programa}}</td>
			<tr/>
			<tr>
				<th>Requisitos de ingreso</th>
				<td>{{$programa->requisitos_ingreso}}</td>
			<tr/>
			<tr>
				<th>Lugar de trabajo de los egresados</th>
				<td>{{$programa->trabajo_egresados}}</td>
			<tr/>
			<tr>
				<th>Escuela</th>
				<td>{{$programa->nombre_escuela}}</td>
			<tr/>
			<tr>
				<th>País</th>
				<td>{{ucfirst($programa->pais)}}</td>
			<tr/>
		</table>
	</div>
	<div class="row">
		<div class="col-md-12">
			{{ Form::open(['method' => 'Get', 'route' => ['programas.edit', $programa->id]]) }}
				<button type="submit" class="btn btn-primary">
					Editar Programa <i class="fa fa-edit" aria-hidden="true"></i>
				</button>
			{{ Form::close() }}
		</div>
	</div>
	<div class="panel panel-warning">
		<div class="panel-heading">
			Estudiantes
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6">
				{{ Form::open(['method' => 'Get', 'route' => ['estudiantes.create']]) }}
					<input type="hidden" name="programa_id" id="programa_id" value="{{$programa->id}}">
					<button type="submit" class="btn btn-primary">
						Editar Estudiantes <i class="fa fa-edit" aria-hidden="true"></i>
					</button>
				{{ Form::close() }}
				</div>
				<div class="col-md-6">
					{{ Form::open(['method' => 'Delete', 'route' => ['estudiantes.destroy', $programa->id]]) }}
						<button type="submit" class="btn btn-danger">
							Borrar información estudiantes <i class="fa fa-eraser" aria-hidden="true"></i>
						</button>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-danger">
		<div class="panel-heading">
			Materias
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6">
					{{ Form::open(['method' => 'Get', 'route' => ['modulos.create']]) }}
						<input type="hidden" name="programa_id_m" id="programa_id_m" value="{{$programa->id}}">
						<button type="submit" class="btn btn-primary">
							Agregar Modulo | Matería <i class="fa fa-edit" aria-hidden="true"></i>
						</button>
					{{ Form::close() }}
				</div>
				<div class="col-md-6">
					{{ Form::open(['method' => 'Delete', 'route' => ['modulos.destroy', $programa->id]]) }}
						<button type="submit" class="btn btn-warning">
							Eliminar Modulo | Matería <i class="fa fa-edit" aria-hidden="true"></i>
						</button>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@endsection