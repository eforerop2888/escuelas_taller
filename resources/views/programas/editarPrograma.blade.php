@extends('layouts.principal')
@section('title', 'Editar Programa')
@section('subtitle', 'EDITAR PROGRAMA')
@section('content')
	{{Form::open(['route' => ['programas.update', $programa->id], 'method' => 'PUT', 'id' => 'form-editar-programa'])}}
		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('nombre_programa') ? ' has-error ' : ''}}">
					<label for="nombre_programa">Nombre Programa</label>
					<input type="text" id="nombre_programa" name="nombre_programa" class="form-control" required placeholder="Nombre Programa" autofocus value="{{$programa->nombre}}">
					@if ($errors->has('nombre_programa'))
            <span>
              <strong>{{ $errors->first('nombre_programa') }}</strong>
            </span>
        	@endif
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('duracion_meses') ? ' has-error ' : ''}}">
					<label for="duracion_meses">Duración meses</label>
					<input type="number" id="duracion_meses" name="duracion_meses" class="form-control" required placeholder="Duración meses" value="{{$programa->duracion_meses}}">
					@if ($errors->has('duracion_meses'))
			            <span>
			              <strong>{{ $errors->first('duracion_meses') }}</strong>
			            </span>
		        	@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('duracion_horas') ? ' has-error ' : ''}}">
					<label for="duracion_horas">Duración en total (horas)</label>
					<input type="number" id="duracion_horas" name="duracion_horas" class="form-control" required placeholder="Duración horas" value="{{$programa->duracion_horas}}">
					@if ($errors->has('duracion_horas'))
			            <span>
			              <strong>{{ $errors->first('duracion_horas') }}</strong>
			            </span>
		        	@endif
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('duracion_practica') ? ' has-error ' : ''}}">
					<label for="duracion_practica">Duración Practica (Horas)</label>
					<input type="number" id="duracion_practica" name="duracion_practica" class="form-control" required placeholder="Duración Practica (Horas)" value="{{$programa->duracion_practicas_horas}}">
					@if ($errors->has('duracion_practica'))
			            <span>
			              <strong>{{ $errors->first('duracion_practica') }}</strong>
			            </span>
			        @endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('objetivo_programa') ? ' has-error ' : ''}}">
					<label for="objetivo_programa">Objetivo del Programa (Máximo 500 caracteres)</label>
					<textarea id="objetivo_programa" name="objetivo_programa" class="form-control" required maxlength="500">{{$programa->objetivo_programa}}</textarea>
					@if ($errors->has('objetivo_programa'))
			            <span>
			              <strong>{{ $errors->first('objetivo_programa') }}</strong>
			            </span>
			      	@endif
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('requisitos_ingreso') ? ' has-error ' : ''}}">
					<label for="requisitos_ingreso">Requisitos de Ingreso (Máximo 500 caracteres)</label>
					<textarea id="requisitos_ingreso" name="requisitos_ingreso" class="form-control" required maxlength="500">{{$programa->requisitos_ingreso}}</textarea>
					@if ($errors->has('requisitos_ingreso'))
			            <span>
			              <strong>{{ $errors->first('requisitos_ingreso') }}</strong>
			            </span>
		        	@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('trabajo_egresados') ? ' has-error ' : ''}}">
					<label for="trabajo_egresados">Perfil de espacios laborales (Máximo 500 caracteres)</label>
					<a href="#" class="tooltips" title="Es una síntesis de sus competencias donde se incluye aspectos como la formación académica y experiencia laboral, enfatizando en habilidades demostrables y logros.">
						<i class="fa fa-question-circle" aria-hidden="true"></i>
					</a>
					<textarea id="trabajo_egresados" name="trabajo_egresados" class="form-control" required maxlength="500">{{$programa->trabajo_egresados}}</textarea>
					@if ($errors->has('trabajo_egresados'))
			            <span>
			              <strong>{{ $errors->first('trabajo_egresados') }}</strong>
			            </span>
		        	@endif
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('escuelas_id') ? ' has-error ' : ''}}">
					<label for="escuelas_id">Seleccionar Escuela</label>
					<select id="escuelas_id" name="escuelas_id" class="form-control">
						@foreach($escuelas as $rowEscuelas)
							@if($programa->escuela_id == $rowEscuelas->id)
								<option value="{{$rowEscuelas->id}}" selected="selected">{{ucfirst($rowEscuelas->nombre)}}</option>
							@else
								<option value="{{$rowEscuelas->id}}">{{ucfirst($rowEscuelas->nombre)}}</option>
							@endif
						@endforeach
					</select>
					@if ($errors->has('escuelas_id'))
			            <span>
			              <strong>{{ $errors->first('escuelas_id') }}</strong>
			            </span>
		        	@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('estado') ? ' has-error ' : ''}}">
					<label for="estado">Seleccionar Estado</label>
					<select id="estado" name="estado" class="form-control">
						@foreach($estados as $rowEstados)
							@if($programa->estado_id == $rowEstados->id)
								<option value="{{$rowEstados->id}}" selected="selected">{{ucfirst($rowEstados->estado)}}</option>
							@else
								<option value="{{$rowEstados->id}}">{{ucfirst($rowEstados->estado)}}</option>
							@endif
						@endforeach
					</select>
					@if ($errors->has('estado'))
			            <span>
			              <strong>{{ $errors->first('estado') }}</strong>
			            </span>
		        	@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i>
				Guardar</button>
			</div>
		</div>
	{{Form::close()}}
@endsection
@section('scripts')
	<script type="text/javascript">
	$('.tooltips').poshytip({
		className: 'tip-twitter',
		showOn: 'none',
		alignTo: 'target',
		alignX: 'inner-left',
		offsetX: 0,
		offsetY: 5
	});
        $('.tooltips').click(function(e){
        	$(this).poshytip('show');
        	$(this).poshytip('hideDelayed', 5000);
        });
    </script>
@endsection