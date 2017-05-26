@extends('layouts.principal')
@section('title', 'Crear Estudiantes')
@section('subtitle', 'CREAR ESTUDIANTES')
@section('content')
	{{Form::open(['route' => 'estudiantes.store', 'method' => 'POST', 'id' => 'form-crear-estudiantes'])}}
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
				<label>Total</label>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('total_hombres') ? ' has-error ' : ''}}">
					<input type="number" class="sumar_hombres" id="total_hombres" name="total_hombres" class="form-control" required value="{{old('total_hombres')}}" placeholder="Total Hombres" autofocus>
					@if ($errors->has('total_hombres'))
	          			<span>
	          			  <strong>{{ $errors->first('total_hombres') }}</strong>
	          			</span>
	      			@endif
				</div>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('total_mujeres') ? ' has-error ' : ''}}">
					<input type="number" class="sumar_mujeres" id="total_mujeres" name="total_mujeres" class="form-control" required value="{{old('total_mujeres')}}" placeholder="Total Mujeres">
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
					<input type="number" class="sumar_hombres" id="etnia_hombres" name="etnia_hombres" class="form-control" required value="{{old('etnia_hombres')}}" placeholder="Etnia Hombres" autofocus>
					@if ($errors->has('etnia_hombres'))
	          			<span>
	          			  <strong>{{ $errors->first('etnia_hombres') }}</strong>
	          			</span>
	      			@endif
				</div>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('etnia_mujeres') ? ' has-error ' : ''}}">
					<input type="number" class="sumar_mujeres" id="etnia_mujeres" name="etnia_mujeres" class="form-control" required value="{{old('etnia_mujeres')}}" placeholder="Etnia Mujeres">
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
					<input type="number" class="sumar_hombres" id="victimas_hombres" name="victimas_hombres" class="form-control" required value="{{old('victimas_hombres')}}" placeholder="Victimas Hombres" autofocus>
					@if ($errors->has('victimas_hombres'))
			          <span>
			            <strong>{{ $errors->first('victimas_hombres') }}</strong>
			          </span>
			      	@endif
				</div>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('victimas_mujeres') ? ' has-error ' : ''}}">
					<input type="number" class="sumar_mujeres" id="victimas_mujeres" name="victimas_mujeres" class="form-control" required value="{{old('victimas_mujeres')}}" placeholder="Victimas Mujeres">
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
					<input type="number" class="sumar_hombres" id="excombatientes_hombres" name="excombatientes_hombres" class="form-control" required value="{{old('excombatientes_hombres')}}" placeholder="Victimas Hombres" autofocus>
					@if ($errors->has('excombatientes_hombres'))
			          <span>
			            <strong>{{ $errors->first('excombatientes_hombres') }}</strong>
			          </span>
			      	@endif
				</div>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('excombatientes_mujeres') ? ' has-error ' : ''}}">
					<input type="number" class="sumar_mujeres" id="excombatientes_mujeres" name="excombatientes_mujeres" class="form-control" required value="{{old('excombatientes_mujeres')}}" placeholder="Victimas Mujeres">
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
					<input type="number" class="sumar_hombres" id="desplazados_hombres" name="desplazados_hombres" class="form-control" required value="{{old('desplazados_hombres')}}" placeholder="Desplazados Hombres" autofocus>
					@if ($errors->has('desplazados_hombres'))
			          <span>
			            <strong>{{ $errors->first('desplazados_hombres') }}</strong>
			          </span>
			      	@endif
				</div>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('desplazados_mujeres') ? ' has-error ' : ''}}">
					<input type="number" class="sumar_mujeres" id="desplazados_mujeres" name="desplazados_mujeres" class="form-control" required value="{{old('desplazados_mujeres')}}" placeholder="Desplazados Mujeres">
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
					<input type="number" class="sumar_hombres" id="pobreza_hombres" name="pobreza_hombres" class="form-control" required value="{{old('pobreza_hombres')}}" placeholder="Probreza Hombres" autofocus>
					@if ($errors->has('pobreza_hombres'))
			          <span>
			            <strong>{{ $errors->first('pobreza_hombres') }}</strong>
			          </span>
			      	@endif
				</div>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('pobreza_mujeres') ? ' has-error ' : ''}}">
					<input type="number" class="sumar_mujeres" id="pobreza_mujeres" name="pobreza_mujeres" class="form-control" required value="{{old('pobreza_mujeres')}}" placeholder="Pobreza Mujeres">
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
				<label>Estudiantes Certificados</label>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('certificados_hombres') ? ' has-error ' : ''}}">
					<input type="number" class="sumar_hombres" id="certificados_hombres" name="certificados_hombres" class="form-control" required value="{{old('certificados_hombres')}}" placeholder="Estudiantes Certificados Hombres" autofocus>
					@if ($errors->has('certificados_hombres'))
			          <span>
			            <strong>{{ $errors->first('certificados_hombres') }}</strong>
			          </span>
			      	@endif
				</div>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('certificados_mujeres') ? ' has-error ' : ''}}">
					<input type="number" class="sumar_mujeres" id="certificados_mujeres" name="certificados_mujeres" class="form-control" required value="{{old('certificados_mujeres')}}" placeholder="Estudiantes certificados Mujeres">
					@if ($errors->has('certificados_mujeres'))
			          <span>
			            <strong>{{ $errors->first('certificados_mujeres') }}</strong>
			          </span>
			      	@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group {{ $errors->has('causas_desercion') ? ' has-error ' : ''}}">
					<label for="causas_desercion">Causas de deserción</label>
					<textarea id="causas_desercion" name="causas_desercion" class="form-control" required value="{{old('causas_desercion')}}"></textarea>
					@if ($errors->has('causas_desercion'))
			            <span>
			              <strong>{{ $errors->first('causas_desercion') }}</strong>
			            </span>
		        	@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<button type="submit" class="btn btn-primary">
					<i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar
				</button>
			</div>
		</div>
	{{Form::close()}}
@endsection
