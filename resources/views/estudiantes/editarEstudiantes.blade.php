@extends('layouts.principal')
@section('title', 'Editar Estudiantes')
@section('subtitle', 'EDITAR ESTUDIANTES')
@section('content')
	{{Form::open(['route' => ['estudiantes.update', $programaD->id], 'method' => 'PUT', 'id' => 'form-editar-estudiantes'])}}
		<div class="row">
			<div class="col-md-4 col-xs-4">
				<label>Programa</label>
			</div>
			<div class="col-md-8 col-xs-8">
				<div class="form-group {{ $errors->has('programa') ? ' has-error ' : ''}}">
					<select id="programa" name="programa" class="form-control" required>
						@foreach($programas as $rowProgramas)
							<option value="{{$rowProgramas->id}}">{{$rowProgramas->nombre}}</option>
						@endforeach
					</select>
					@if ($errors->has('programa'))
			          <span>
			            <strong>{{ $errors->first('programa') }}</strong>
			          </span>
			      	@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-xs-4">
				<label>Estudiantes Matriculados</label>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('total_hombres') ? ' has-error ' : ''}}">
					<input type="number" id="total_hombres" name="total_hombres" class="form-control" required value="{{$estudiantes->total_hombres}}" placeholder="Total Hombres" autofocus>
					@if ($errors->has('total_hombres'))
	          			<span>
	          			  <strong>{{ $errors->first('total_hombres') }}</strong>
	          			</span>
	      			@endif
				</div>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('total_mujeres') ? ' has-error ' : ''}}">
					<input type="number" id="total_mujeres" name="total_mujeres" class="form-control" required value="{{$estudiantes->total_mujeres}}" placeholder="Total Mujeres">
					@if ($errors->has('total_mujeres'))
			          <span>
			            <strong>{{ $errors->first('total_mujeres') }}</strong>
			          </span>
			      	@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-xs-4">
				<label>Etnia</label>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('etnia_hombres') ? ' has-error ' : ''}}">
					<input type="number" id="etnia_hombres" name="etnia_hombres" class="form-control" required value="{{$estudiantes->etnia_hombres}}" placeholder="Etnia Hombres">
					@if ($errors->has('etnia_hombres'))
	          			<span>
	          			  <strong>{{ $errors->first('etnia_hombres') }}</strong>
	          			</span>
	      			@endif
				</div>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('etnia_mujeres') ? ' has-error ' : ''}}">
					<input type="number" id="etnia_mujeres" name="etnia_mujeres" class="form-control" required value="{{$estudiantes->etnia_mujeres}}" placeholder="Etnia Mujeres">
					@if ($errors->has('etnia_mujeres'))
			          <span>
			            <strong>{{ $errors->first('etnia_mujeres') }}</strong>
			          </span>
			      	@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-xs-4">
				<label>Victimas</label>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('victimas_hombres') ? ' has-error ' : ''}}">
					<input type="number" id="victimas_hombres" name="victimas_hombres" class="form-control" required value="{{$estudiantes->victimas_hombres}}" placeholder="Victimas Hombres" autofocus>
					@if ($errors->has('victimas_hombres'))
			          <span>
			            <strong>{{ $errors->first('victimas_hombres') }}</strong>
			          </span>
			      	@endif
				</div>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('victimas_mujeres') ? ' has-error ' : ''}}">
					<input type="number" id="victimas_mujeres" name="victimas_mujeres" class="form-control" required value="{{$estudiantes->victimas_mujeres}}" placeholder="Victimas Mujeres">
					@if ($errors->has('victimas_mujeres'))
			          <span>
			            <strong>{{ $errors->first('victimas_mujeres') }}</strong>
			          </span>
			      	@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-xs-4">
				<label>Excombatientes</label>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('excombatientes_hombres') ? ' has-error ' : ''}}">
					<input type="number" id="excombatientes_hombres" name="excombatientes_hombres" class="form-control" required value="{{$estudiantes->excombatientes_hombres}}" placeholder="Victimas Hombres" autofocus>
					@if ($errors->has('excombatientes_hombres'))
			          <span>
			            <strong>{{ $errors->first('excombatientes_hombres') }}</strong>
			          </span>
			      	@endif
				</div>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('excombatientes_mujeres') ? ' has-error ' : ''}}">
					<input type="number" id="excombatientes_mujeres" name="excombatientes_mujeres" class="form-control" required value="{{$estudiantes->excombatientes_mujeres}}" placeholder="Victimas Mujeres">
					@if ($errors->has('excombatientes_mujeres'))
			          <span>
			            <strong>{{ $errors->first('excombatientes_mujeres') }}</strong>
			          </span>
			      	@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-xs-4">
				<label>Desplazados</label>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('desplazados_hombres') ? ' has-error ' : ''}}">
					<input type="number" id="desplazados_hombres" name="desplazados_hombres" class="form-control" required value="{{$estudiantes->desplazados_hombres}}" placeholder="Desplazados Hombres" autofocus>
					@if ($errors->has('desplazados_hombres'))
			          <span>
			            <strong>{{ $errors->first('desplazados_hombres') }}</strong>
			          </span>
			      	@endif
				</div>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('desplazados_mujeres') ? ' has-error ' : ''}}">
					<input type="number" id="desplazados_mujeres" name="desplazados_mujeres" class="form-control" required value="{{$estudiantes->desplazados_mujeres}}" placeholder="Desplazados Mujeres">
					@if ($errors->has('desplazados_mujeres'))
			          <span>
			            <strong>{{ $errors->first('desplazados_mujeres') }}</strong>
			          </span>
			      	@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-xs-4">
				<label>Pobreza</label>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('pobreza_hombres') ? ' has-error ' : ''}}">
					<input type="number" id="pobreza_hombres" name="pobreza_hombres" class="form-control" required value="{{$estudiantes->pobreza_hombres}}" placeholder="Probreza Hombres" autofocus>
					@if ($errors->has('pobreza_hombres'))
			          <span>
			            <strong>{{ $errors->first('pobreza_hombres') }}</strong>
			          </span>
			      	@endif
				</div>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('pobreza_mujeres') ? ' has-error ' : ''}}">
					<input type="number" id="pobreza_mujeres" name="pobreza_mujeres" class="form-control" required value="{{$estudiantes->pobreza_mujeres}}" placeholder="Pobreza Mujeres">
					@if ($errors->has('pobreza_mujeres'))
			          <span>
			            <strong>{{ $errors->first('pobreza_mujeres') }}</strong>
			          </span>
			      	@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-xs-4">
				<label>Pobreza</label>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('cabeza_hombres') ? ' has-error ' : ''}}">
					<input type="number" id="cabeza_hombres" name="cabeza_hombres" class="form-control" required value="{{$estudiantes->cabeza_hombres}}" placeholder="Cabeza de familia hombres" autofocus>
					@if ($errors->has('cabeza_hombres'))
			          <span>
			            <strong>{{ $errors->first('cabeza_hombres') }}</strong>
			          </span>
			      	@endif
				</div>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('cabeza_mujeres') ? ' has-error ' : ''}}">
					<input type="number" id="cabeza_mujeres" name="cabeza_mujeres" class="form-control" required value="{{$estudiantes->cabeza_mujeres}}" placeholder="Cabeza de familia mujeres">
					@if ($errors->has('cabeza_mujeres'))
			          <span>
			            <strong>{{ $errors->first('cabeza_mujeres') }}</strong>
			          </span>
			      	@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-xs-4">
				<label>Estudiantes Certificados</label>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('certificados_hombres') ? ' has-error ' : ''}}">
					<input type="number" id="certificados_hombres" name="certificados_hombres" class="form-control" required value="{{$estudiantes->certificados_hombres}}" placeholder="Estudiantes Certificados Hombres" autofocus>
					@if ($errors->has('certificados_hombres'))
			          <span>
			            <strong>{{ $errors->first('certificados_hombres') }}</strong>
			          </span>
			      	@endif
				</div>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('certificados_mujeres') ? ' has-error ' : ''}}">
					<input type="number" id="certificados_mujeres" name="certificados_mujeres" class="form-control" required value="{{$estudiantes->certificados_mujeres}}" placeholder="Estudiantes certificados Mujeres">
					@if ($errors->has('certificados_mujeres'))
			          <span>
			            <strong>{{ $errors->first('certificados_mujeres') }}</strong>
			          </span>
			      	@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('causas_desercion') ? ' has-error ' : ''}}">
					<label for="causas_desercion">Causas de deserción</label>
					<textarea id="causas_desercion" name="causas_desercion" class="form-control" required>{{$estudiantes->causas_desercion}}</textarea>
					@if ($errors->has('causas_desercion'))
			            <span>
			              <strong>{{ $errors->first('causas_desercion') }}</strong>
			            </span>
		        	@endif
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('Observaciones') ? ' has-error ' : ''}}">
					<label for="observaciones">Observaciones Adicionales</label>
					<textarea id="observaciones" name="observaciones" class="form-control" required>{{$estudiantes->observaciones}}</textarea>
					@if ($errors->has('observaciones'))
			            <span>
			              <strong>{{ $errors->first('observaciones') }}</strong>
			            </span>
		        	@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<input type="hidden" name="id_estudiantes" id="id_estudiantes" value="{{$estudiantes->id}}">
				<button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
			</div>
		</div>
	{{Form::close()}}
@endsection