@extends('layouts.secundario')
@section('title', 'Detalle Programa')
@section('content')
	<div class="panel panel-primary">
		<div class="panel-heading">
			Detalle programa {{$programa->nombre}}
		</div>
		<div class="panel-body">
			@if( !empty($programa))
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
			@endif
			<div class="row">
				<div class="col-md-6">
					{{ Form::open(['method' => 'Get', 'route' => ['programas.edit', $programa->id]]) }}
						<button type="submit" class="btn btn-primary">
							Editar Programa <i class="fa fa-edit" aria-hidden="true"></i>
						</button>
					{{ Form::close() }}
				</div>
				<div class="col-md-6">
					{{ Form::open(['method' => 'Delete', 'route' => ['programas.destroy', $programa->id]]) }}
						<button type="submit" class="btn btn-danger">
							Eliminar Programa <i class="fa fa-eraser" aria-hidden="true"></i>
						</button>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-warning">
		<div class="panel-heading">
			Estudiantes
		</div>
		<div class="panel-body">
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
	<div class="panel panel-success">
		<div class="panel-heading">
			Módulos | Materias
		</div>
		<div class="panel-body">
			@if( !empty($modulos))
				<div class="table-responsive">
					<table class="table table-hover">
						<tr>
							<th>Nombre Módulo</th>
							<th>Duración Meses</th>
							<th>Tipo</th>
							<th>Nombre Maestro</th>
							<th>Ver</th>
							<th>Eliminar</th>
						</tr>
						@foreach ($modulos as $rowmodulos)
							<tr>
								<td>{{ucfirst($rowmodulos->nombre)}}</td>
								<td>{{$rowmodulos->duracion}}</td>
								<td>{{ucfirst($rowmodulos->tipo)}}</td>
								<td>{{ucfirst($rowmodulos->nombre_maestro)}}</td>
								<td>
									{{ Form::open(['method' => 'Get', 'route' => ['modulos.show', $rowmodulos->id_modulos]]) }}
										<button type="submit" class="btn btn-warning">
											<i class="fa fa-eye" aria-hidden="true"></i>
										</button>
									{{ Form::close() }}
								</td>
								<td>
									{{ Form::open(['method' => 'Delete', 'route' => ['modulos.destroy', $rowmodulos->id_modulos]]) }}
										<input type="hidden" name="id_programam" value="{{$programa->id}}">
										<button type="submit" class="btn btn-warning">
											<i class="fa fa-eraser" aria-hidden="true"></i>
										</button>
									{{ Form::close() }}
								</td>
							</tr>
						@endforeach
					</table>
				</div>
			@endif
			<div class="row">
				<div class="col-md-6">
					{{ Form::open(['method' => 'Get', 'route' => ['modulos.create']]) }}
						<input type="hidden" name="programa_id_m" id="programa_id_m" value="{{$programa->id}}">
						<button type="submit" class="btn btn-primary">
							Agregar Modulo | Matería <i class="fa fa-edit" aria-hidden="true"></i>
						</button>
					{{ Form::close() }}
				</div>
				
			</div>
		</div>
	</div>
@endsection