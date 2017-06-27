@extends('layouts.principal')
@section('title', 'Crear Estudiantes')
@section('subtitle', 'CREAR ESTUDIANTES')
@section('content')
	<div class="table-responsive">
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
				<div class="col-md-4 col-xs-4"></div>
				<div class="col-md-4 col-xs-4 titulo_generos">
					<h4>Hombres</h4>
				</div>
				<div class="col-md-4 col-xs-4 titulo_generos">
					<h4>Mujeres</h4>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-xs-4">
					<label>Estudiantes Matriculados</label>
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
					<label>Cabeza de familia</label>
				</div>
				<div class="col-md-4 col-xs-4">
					<div class="form-group {{ $errors->has('cabeza_hombres') ? ' has-error ' : ''}}">
						<input type="number" class="sumar_hombres" id="cabeza_hombres" name="cabeza_hombres" class="form-control" required value="{{old('cabeza_hombres')}}" placeholder="Cabeza de familia hombres" autofocus>
						@if ($errors->has('cabeza_hombres'))
				          <span>
				            <strong>{{ $errors->first('cabeza_hombres') }}</strong>
				          </span>
				      	@endif
					</div>
				</div>
				<div class="col-md-4 col-xs-4">
					<div class="form-group {{ $errors->has('cabeza_mujeres') ? ' has-error ' : ''}}">
						<input type="number" class="sumar_mujeres" id="cabeza_mujeres" name="cabeza_mujeres" class="form-control" required value="{{old('cabeza_mujeres')}}" placeholder="Cabeza de familia mujeres">
						@if ($errors->has('cabeza_mujeres'))
				          <span>
				            <strong>{{ $errors->first('cabeza_mujeres') }}</strong>
				          </span>
				      	@endif
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h3>Información Programa<h3>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-xs-4">Estudiantes Certificados</div>
				<div class="col-md-4 col-xs-4">
					<div class="form-group {{ $errors->has('certificados_hombres') ? ' has-error ' : ''}}">
						<input type="number" class="sumar_hombres" id="certificados_hombres" name="certificados_hombres" class="form-control" required value="{{old('certificados_hombres')}}" placeholder="Hombres" autofocus>
						@if ($errors->has('certificados_hombres'))
				          <span>
				            <strong>{{ $errors->first('certificados_hombres') }}</strong>
				          </span>
				      	@endif
					</div>
				</div>
				<div class="col-md-4 col-xs-4">
					<div class="form-group {{ $errors->has('certificados_mujeres') ? ' has-error ' : ''}}">
						<input type="number" class="sumar_mujeres" id="certificados_mujeres" name="certificados_mujeres" class="form-control" required value="{{old('certificados_mujeres')}}" placeholder="Mujeres">
						@if ($errors->has('certificados_mujeres'))
				          <span>
				            <strong>{{ $errors->first('certificados_mujeres') }}</strong>
				          </span>
				      	@endif
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-xs-4">Egresados programa</div>
				<div class="col-md-4 col-xs-4">
					<div class="form-group {{ $errors->has('egresados_programa_hombres') ? ' has-error ' : ''}}">
						<input type="number" class="sumar_hombres" id="egresados_programa_hombres" name="egresados_programa_hombres" class="form-control" required value="{{old('egresados_programa_hombres')}}" placeholder="Hombres" autofocus>
						@if ($errors->has('egresados_programa_hombres'))
				          <span>
				            <strong>{{ $errors->first('egresados_programa_hombres') }}</strong>
				          </span>
				      	@endif
					</div>
				</div>
				<div class="col-md-4 col-xs-4">
					<div class="form-group {{ $errors->has('egresados_programa_mujeres') ? ' has-error ' : ''}}">
						<input type="number" class="sumar_mujeres" id="egresados_programa_mujeres" name="egresados_programa_mujeres" class="form-control" required value="{{old('egresados_programa_mujeres')}}" placeholder="Mujeres">
						@if ($errors->has('egresados_programa_mujeres'))
				          <span>
				            <strong>{{ $errors->first('egresados_programa_mujeres') }}</strong>
				          </span>
				      	@endif
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-xs-4">Egresados con trabajo</div>
				<div class="col-md-4 col-xs-4">
					<div class="form-group {{ $errors->has('egresados_trabajo_hombres') ? ' has-error ' : ''}}">
						<input type="number" class="sumar_hombres" id="egresados_trabajo_hombres" name="egresados_trabajo_hombres" class="form-control" required value="{{old('egresados_trabajo_hombres')}}" placeholder="Hombres" autofocus>
						@if ($errors->has('egresados_trabajo_hombres'))
				          <span>
				            <strong>{{ $errors->first('egresados_trabajo_hombres') }}</strong>
				          </span>
				      	@endif
					</div>
				</div>
				<div class="col-md-4 col-xs-4">
					<div class="form-group {{ $errors->has('egresados_trabajo_mujeres') ? ' has-error ' : ''}}">
						<input type="number" class="sumar_mujeres" id="egresados_trabajo_mujeres" name="egresados_trabajo_mujeres" class="form-control" required value="{{old('egresados_trabajo_mujeres')}}" placeholder="Mujeres">
						@if ($errors->has('egresados_trabajo_mujeres'))
				          <span>
				            <strong>{{ $errors->first('egresados_trabajo_mujeres') }}</strong>
				          </span>
				      	@endif
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-xs-4">Egresados con trabajo en otro oficio</div>
				<div class="col-md-4 col-xs-4">
					<div class="form-group {{ $errors->has('egresados_trabajo_otro_hombres') ? ' has-error ' : ''}}">
						<input type="number" class="sumar_hombres" id="egresados_trabajo_otro_hombres" name="egresados_trabajo_otro_hombres" class="form-control" required value="{{old('egresados_trabajo_otro_hombres')}}" placeholder="Hombres" autofocus>
						@if ($errors->has('egresados_trabajo_otro_hombres'))
				          <span>
				            <strong>{{ $errors->first('egresados_trabajo_otro_hombres') }}</strong>
				          </span>
				      	@endif
					</div>
				</div>
				<div class="col-md-4 col-xs-4">
					<div class="form-group {{ $errors->has('egresados_trabajo_otro_mujeres') ? ' has-error ' : ''}}">
						<input type="number" class="sumar_mujeres" id="egresados_trabajo_otro_mujeres" name="egresados_trabajo_otro_mujeres" class="form-control" required value="{{old('egresados_trabajo_otro_mujeres')}}" placeholder="Mujeres">
						@if ($errors->has('egresados_trabajo_otro_mujeres'))
				          <span>
				            <strong>{{ $errors->first('egresados_trabajo_otro_mujeres') }}</strong>
				          </span>
				      	@endif
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-xs-4">Egresados desempleados</div>
				<div class="col-md-4 col-xs-4">
					<div class="form-group {{ $errors->has('egresados_desempleados_hombres') ? ' has-error ' : ''}}">
						<input type="number" class="sumar_hombres" id="egresados_desempleados_hombres" name="egresados_desempleados_hombres" class="form-control" required value="{{old('egresados_desempleados_hombres')}}" placeholder="Hombres" autofocus>
						@if ($errors->has('egresados_desempleados_hombres'))
				          <span>
				            <strong>{{ $errors->first('egresados_desempleados_hombres') }}</strong>
				          </span>
				      	@endif
					</div>
				</div>
				<div class="col-md-4 col-xs-4">
					<div class="form-group {{ $errors->has('egresados_desempleados_mujeres') ? ' has-error ' : ''}}">
						<input type="number" class="sumar_mujeres" id="egresados_desempleados_mujeres" name="egresados_desempleados_mujeres" class="form-control" required value="{{old('egresados_desempleados_mujeres')}}" placeholder="Mujeres">
						@if ($errors->has('egresados_desempleados_mujeres'))
				          <span>
				            <strong>{{ $errors->first('egresados_desempleados_mujeres') }}</strong>
				          </span>
				      	@endif
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group {{ $errors->has('causas_desercion') ? ' has-error ' : ''}}">
						<label for="causas_desercion">Causas de deserción (Máximo 500 caracteres)</label>
						<textarea maxlength="500" id="causas_desercion" name="causas_desercion" class="form-control" required value="{{old('causas_desercion')}}"></textarea>
						@if ($errors->has('causas_desercion'))
				            <span>
				              <strong>{{ $errors->first('causas_desercion') }}</strong>
				            </span>
			        	@endif
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group {{ $errors->has('Observaciones') ? ' has-error ' : ''}}">
						<label for="observaciones">Observaciones Adicionales (Máximo 500 caracteres)</label>
						<textarea maxlength="500" id="observaciones" name="observaciones" class="form-control" required value="{{old('observaciones')}}"></textarea>
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
					<button type="submit" class="btn btn-primary">
						<i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar
					</button>
				</div>
			</div>
		{{Form::close()}}
	</div>
@endsection
