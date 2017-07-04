@extends('layouts.secundario')
@section('title', 'Detalle Programa')
@section('content')
	<div class="panel panel-primary">
		<div class="panel-heading">
			Detalle programa {{$programa->nombre}}
		</div>
		<div class="panel-body">
			@if( $programa->count())
				<div class="table-responsive">
					<table class="table table-hover">
						<tr>
							<th>Duración (Meses)</th>
							<td>{{$programa->duracion_meses}}</td>
						</tr>
						<tr>
							<th>Duración en total (Horas)</th>
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
							<th>Perfil de espacios laborales</th>
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
						<tr>
							<th>Estado</th>
							<td>{{ucfirst($programa->estado)}}</td>
						<tr/>
					</table>
				</div>
			@endif
			@if(Auth::user()->pais_id == $programa->pais_id)
				<div class="row">
					<div class="col-md-6">
						{{ Form::open(['method' => 'Get', 'route' => ['programas.edit', $programa->id]]) }}
							<button type="submit" class="btn btn-warning">
								<i class="fa fa-edit" aria-hidden="true"></i>
								Editar Programa
							</button>
						{{ Form::close() }}
					</div>
					@if(Auth::user()->role_id == 1)
						<div class="col-md-6">
							{{ Form::open(['method' => 'Delete', 'route' => ['programas.destroy', $programa->id], 'class' => 'form-eliminar']) }}
								<button type="submit" class="btn btn-danger">
									<i class="fa fa-eraser" aria-hidden="true"></i>
									Eliminar Programa
								</button>
							{{ Form::close() }}
						</div>
					@endif
				</div>
			@endif
		</div>
	</div>
	<div class="panel panel-warning">
		<div class="panel-heading">
			Estudiantes
		</div>
		<div class="panel-body">
		@if( !empty($estudiantes))
			<div class="table-responsive">
				<table class="table table-hover">
					<tr>
						<th></th>
						<th>Mujeres</th>
						<th>Hombres</th>
					</tr>
					<tr>
						<th>Estudiantes Matriculados</th>
						<td>{{$estudiantes->total_mujeres}}</td>
						<td>{{$estudiantes->total_hombres}}</td>
					</tr>
					<tr>
						<th>Blancos</th>
						<td>{{$estudiantes->blanco_mujeres}}</td>
						<td>{{$estudiantes->blanco_hombres}}</td>
					</tr>
					<tr>
						<th>Caucásicos</th>
						<td>{{$estudiantes->caucasico_mujeres}}</td>
						<td>{{$estudiantes->caucasico_hombres}}</td>
					</tr>
					<tr>
						<th>Afrodescendientes</th>
						<td>{{$estudiantes->afrodescendiente_mujeres}}</td>
						<td>{{$estudiantes->afrodescendiente_hombres}}</td>
					</tr>
					<tr>
						<th>Indígenas</th>
						<td>{{$estudiantes->indigena_mujeres}}</td>
						<td>{{$estudiantes->indigena_hombres}}</td>
					</tr>
					<tr>
						<th>Mestizos</th>
						<td>{{$estudiantes->mestizo_mujeres}}</td>
						<td>{{$estudiantes->mestizo_hombres}}</td>
					</tr>
					<tr>
						<th>Raizal (isleño)</th>
						<td>{{$estudiantes->raizal_isleno_mujeres}}</td>
						<td>{{$estudiantes->raizal_isleno_hombres}}</td>
					</tr>
					<tr>
						<th>Rom (Gitano)</th>
						<td>{{$estudiantes->rom_gitano_mujeres}}</td>
						<td>{{$estudiantes->rom_gitano_hombres}}</td>
					</tr>
					<tr>
						<th>Criollo</th>
						<td>{{$estudiantes->criollo_mujeres}}</td>
						<td>{{$estudiantes->criollo_hombres}}</td>
					</tr>
					<tr>
						<th>Amerindio</th>
						<td>{{$estudiantes->amerindio_mujeres}}</td>
						<td>{{$estudiantes->amerindio_hombres}}</td>
					</tr>
					<tr>
						<th>Polinesio</th>
						<td>{{$estudiantes->polinesio_mujeres}}</td>
						<td>{{$estudiantes->polinesio_hombres}}</td>
					</tr>
					<tr>
						<th>Melanesio</th>
						<td>{{$estudiantes->melanesio_mujeres}}</td>
						<td>{{$estudiantes->melanesio_hombres}}</td>
					</tr>
					<tr>
						<th>Asiático</th>
						<td>{{$estudiantes->asiatico_mujeres}}</td>
						<td>{{$estudiantes->asiatico_hombres}}</td>
					</tr>
					<tr>
						<th>Victimas</th>
						<td>{{$estudiantes->victimas_mujeres}}</td>
						<td>{{$estudiantes->victimas_hombres}}</td>
					<tr/>
					<tr>
						<th>Excombatientes</th>
						<td>{{$estudiantes->excombatientes_mujeres}}</td>
						<td>{{$estudiantes->excombatientes_hombres}}</td>
					<tr/>
					<tr>
						<th>Desplazados</th>
						<td>{{$estudiantes->desplazados_mujeres}}</td>
						<td>{{$estudiantes->desplazados_hombres}}</td>
					<tr/>
					<tr>
						<th>Pobreza</th>
						<td>{{$estudiantes->pobreza_mujeres}}</td>
						<td>{{$estudiantes->pobreza_hombres}}</td>
					<tr/>
					<tr>
						<th>Cabeza de familia</th>
						<td>{{$estudiantes->cabeza_mujeres}}</td>
						<td>{{$estudiantes->cabeza_hombres}}</td>
					<tr/>
					<tr>
						<th>Estudiantes Certificados</th>
						<td>{{$estudiantes->certificados_mujeres}}</td>
						<td>{{$estudiantes->certificados_hombres}}</td>
					<tr/>
					<tr>
						<th>Egresados Programa</th>
						<td>{{$estudiantes->egresados_programa_mujeres}}</td>
						<td>{{$estudiantes->egresados_programa_hombres}}</td>
					<tr/>
					<tr>
						<th>Estudiantes con trabajo</th>
						<td>{{$estudiantes->egresados_trabajo_mujeres}}</td>
						<td>{{$estudiantes->egresados_trabajo_hombres}}</td>
					<tr/>
					<tr>
						<th>Estudiantes con trabajo en otro oficio</th>
						<td>{{$estudiantes->egresados_trabajo_otro_mujeres}}</td>
						<td>{{$estudiantes->egresados_trabajo_otro_hombres}}</td>
					<tr/>
					<tr>
						<th>Estudiantes con trabajo en otro oficio</th>
						<td>{{$estudiantes->egresados_desempleados_mujeres}}</td>
						<td>{{$estudiantes->egresados_desempleados_hombres}}</td>
					<tr/>
					<tr>
						<th>Causas Deserción</th>
						<td colspan="2">{{$estudiantes->causas_desercion}}</td>
					</tr>
					<tr>
						<th>Observaciones</th>
						<td colspan="2">{{$estudiantes->observaciones}}</td>
					</tr>
				</table>
			</div>
		@endif
		@if(Auth::user()->pais_id == $programa->pais_id)
			<div class="row">
				<div class="col-md-6">
				{{ Form::open(['method' => 'Get', 'route' => ['estudiantes.create']]) }}
					<input type="hidden" name="programa_id" id="programa_id" value="{{$programa->id}}">
					<button type="submit" class="btn btn-warning">
						<i class="fa fa-edit" aria-hidden="true"></i>
						Editar Estudiantes
					</button>
				{{ Form::close() }}
				</div>
				@if( !empty($estudiantes) && Auth::user()->role_id == 1 )
					<div class="col-md-6">
						{{ Form::open(['method' => 'Delete', 'route' => ['estudiantes.destroy', $programa->id], 'class' => 'form-eliminar']) }}
							<button type="submit" class="btn btn-danger">
								<i class="fa fa-eraser" aria-hidden="true"></i> Eliminar información estudiantes
							</button>
						{{ Form::close() }}
					</div>
				@endif
			</div>
		@endif	
		</div>
	</div>
	<div class="panel panel-success">
		<div class="panel-heading">
			Módulos | Materias
		</div>
		<div class="panel-body">
			@if( $modulos->count())
				<div class="table-responsive">
					<table class="table table-hover">
						<tr>
							<th>Nombre Módulo</th>
							<th>Duración Meses</th>
							<th>Tipo</th>
							<th>Nombre Maestro</th>
							@if(Auth::user()->pais_id == $programa->pais_id)
								<th>Ver</th>
								<th>Eliminar</th>
							@endif
						</tr>
						@foreach ($modulos as $rowmodulos)
							<tr>
								<td>{{ucfirst($rowmodulos->nombre)}}</td>
								<td>{{$rowmodulos->duracion}}</td>
								<td>{{ucfirst($rowmodulos->tipo)}}</td>
								<td>{{ucfirst($rowmodulos->nombre_maestro)}}</td>
								@if(Auth::user()->pais_id == $programa->pais_id)
									<td>
										{{ Form::open(['method' => 'Get', 'route' => ['modulos.show', $rowmodulos->id_modulos]]) }}
											<button type="submit" class="btn btn-success">
												<i class="fa fa-eye" aria-hidden="true"></i>
											</button>
										{{ Form::close() }}
									</td>
									<td>
										{{ Form::open(['method' => 'Delete', 'route' => ['modulos.destroy', $rowmodulos->id_modulos]]) }}
											<input type="hidden" name="id_programam" value="{{$programa->id}}">
											<button type="submit" class="btn btn-danger">
												<i class="fa fa-eraser" aria-hidden="true"></i>
											</button>
										{{ Form::close() }}
									</td>
								@endif
							</tr>
						@endforeach
					</table>
				</div>
			@endif
			@if(Auth::user()->pais_id == $programa->pais_id)
				<div class="row">
					<div class="col-md-6">
						{{ Form::open(['method' => 'Get', 'route' => ['modulos.create']]) }}
							<input type="hidden" name="programa_id_m" id="programa_id_m" value="{{$programa->id}}">
							<button type="submit" class="btn btn-primary">
								<i class="fa fa-pencil" aria-hidden="true"></i> Crear Modulo | Matería
							</button>
						{{ Form::close() }}
					</div>			
				</div>
			@endif
		</div>
	</div>
@endsection