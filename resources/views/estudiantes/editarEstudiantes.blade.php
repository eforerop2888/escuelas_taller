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
					<select id="programa" name="programa" required class="form-control">
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
					<input type="number" id="total_hombres" name="total_hombres" required value="{{$estudiantes->total_hombres}}" class="form-control" placeholder="Total Hombres" autofocus>
					@if ($errors->has('total_hombres'))
	          			<span>
	          			  <strong>{{ $errors->first('total_hombres') }}</strong>
	          			</span>
	      			@endif
				</div>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('total_mujeres') ? ' has-error ' : ''}}">
					<input type="number" id="total_mujeres" name="total_mujeres" required value="{{$estudiantes->total_mujeres}}" class="form-control" placeholder="Total Mujeres">
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
				<label>Blancos</label>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('blanco_hombres') ? ' has-error ' : ''}}">
					<input type="number" class="sumar_hombres form-control" id="blanco_hombres" name="blanco_hombres" value="{{$estudiantes->blanco_hombres}}" placeholder="Blancos Hombres" autofocus>
					@if ($errors->has('blanco_hombres'))
	          			<span>
	          			  <strong>{{ $errors->first('blanco_hombres') }}</strong>
	          			</span>
	      			@endif
				</div>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('blanco_mujeres') ? ' has-error ' : ''}}">
					<input type="number" class="sumar_mujeres form-control" id="blanco_mujeres" name="blanco_mujeres" value="{{$estudiantes->blanco_mujeres}}" placeholder="Blancos Mujeres">
					@if ($errors->has('blanco_mujeres'))
			          <span>
			            <strong>{{ $errors->first('blanco_mujeres') }}</strong>
			          </span>
			      	@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-xs-4">
				<label>Caucásicos</label>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('caucasico_hombres') ? ' has-error ' : ''}}">
					<input type="number" class="sumar_hombres form-control" id="caucasico_hombres" name="caucasico_hombres" value="{{$estudiantes->caucasico_hombres}}" placeholder="Caucásicos Hombres" autofocus>
					@if ($errors->has('caucasico_hombres'))
	          			<span>
	          			  <strong>{{ $errors->first('caucasico_hombres') }}</strong>
	          			</span>
	      			@endif
				</div>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('caucasico_mujeres') ? ' has-error ' : ''}}">
					<input type="number" class="sumar_mujeres form-control" id="caucasico_mujeres" name="caucasico_mujeres" value="{{$estudiantes->caucasico_mujeres}}" placeholder="Caucásicos Mujeres">
					@if ($errors->has('caucasico_mujeres'))
			          <span>
			            <strong>{{ $errors->first('caucasico_mujeres') }}</strong>
			          </span>
			      	@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-xs-4">
				<label>Afrodescendientes</label>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('afrodescendiente_hombres') ? ' has-error ' : ''}}">
					<input type="number" class="sumar_hombres form-control" id="afrodescendiente_hombres" name="afrodescendiente_hombres" value="{{$estudiantes->afrodescendiente_hombres}}" placeholder="Afrodescendientes Hombres" autofocus>
					@if ($errors->has('afrodescendiente_hombres'))
	          			<span>
	          			  <strong>{{ $errors->first('afrodescendiente_hombres') }}</strong>
	          			</span>
	      			@endif
				</div>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('afrodescendiente_mujeres') ? ' has-error ' : ''}}">
					<input type="number" class="sumar_mujeres form-control" id="afrodescendiente_mujeres" name="afrodescendiente_mujeres" value="{{$estudiantes->afrodescendiente_mujeres}}" placeholder="Afrodescendientes Mujeres">
					@if ($errors->has('afrodescendiente_mujeres'))
			          <span>
			            <strong>{{ $errors->first('afrodescendiente_mujeres') }}</strong>
			          </span>
			      	@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-xs-4">
				<label>Indígenas</label>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('indigena_hombres') ? ' has-error ' : ''}}">
					<input type="number" class="sumar_hombres form-control" id="indigena_hombres" name="indigena_hombres" value="{{$estudiantes->indigena_hombres}}" placeholder="Indígenas Hombres" autofocus>
					@if ($errors->has('indigena_hombres'))
	          			<span>
	          			  <strong>{{ $errors->first('indigena_hombres') }}</strong>
	          			</span>
	      			@endif
				</div>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('indigena_mujeres') ? ' has-error ' : ''}}">
					<input type="number" class="sumar_mujeres form-control" id="indigena_mujeres" name="indigena_mujeres" value="{{$estudiantes->indigena_mujeres}}" placeholder="Indígenas Mujeres">
					@if ($errors->has('indigena_mujeres'))
			          <span>
			            <strong>{{ $errors->first('indigena_mujeres') }}</strong>
			          </span>
			      	@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-xs-4">
				<label>Mestizos</label>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('mestizo_hombres') ? ' has-error ' : ''}}">
					<input type="number" class="sumar_hombres form-control" id="mestizo_hombres" name="mestizo_hombres" value="{{$estudiantes->mestizo_hombres}}" placeholder="Mestizos Hombres" autofocus>
					@if ($errors->has('mestizo_hombres'))
	          			<span>
	          			  <strong>{{ $errors->first('mestizo_hombres') }}</strong>
	          			</span>
	      			@endif
				</div>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('mestizo_mujeres') ? ' has-error ' : ''}}">
					<input type="number" class="sumar_mujeres form-control" id="mestizo_mujeres" name="mestizo_mujeres" value="{{$estudiantes->mestizo_mujeres}}" placeholder="Mestizos Mujeres">
					@if ($errors->has('mestizo_mujeres'))
			          <span>
			            <strong>{{ $errors->first('mestizo_mujeres') }}</strong>
			          </span>
			      	@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-xs-4">
				<label>Raizal (isleño)</label>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('raizal_isleno_hombres') ? ' has-error ' : ''}}">
					<input type="number" class="sumar_hombres form-control" id="raizal_isleno_hombres" name="raizal_isleno_hombres" value="{{$estudiantes->raizal_isleno_hombres}}" placeholder="Raizal (isleño) Hombres" autofocus>
					@if ($errors->has('raizal_isleno_hombres'))
	          			<span>
	          			  <strong>{{ $errors->first('raizal_isleno_hombres') }}</strong>
	          			</span>
	      			@endif
				</div>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('raizal_isleno_mujeres') ? ' has-error ' : ''}}">
					<input type="number" class="sumar_mujeres form-control" id="raizal_isleno_mujeres" name="raizal_isleno_mujeres" value="{{$estudiantes->raizal_isleno_mujeres}}" placeholder="Raizal (isleño) Mujeres">
					@if ($errors->has('raizal_isleno_mujeres'))
			          <span>
			            <strong>{{ $errors->first('raizal_isleno_mujeres') }}</strong>
			          </span>
			      	@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-xs-4">
				<label>Rom (Gitano)</label>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('rom_gitano_hombres') ? ' has-error ' : ''}}">
					<input type="number" class="sumar_hombres form-control" id="rom_gitano_hombres" name="rom_gitano_hombres" value="{{$estudiantes->rom_gitano_hombres}}" placeholder="Rom (Gitano) Hombres" autofocus>
					@if ($errors->has('rom_gitano_hombres'))
	          			<span>
	          			  <strong>{{ $errors->first('raizal_isleno_hombres') }}</strong>
	          			</span>
	      			@endif
				</div>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('rom_gitano_mujeres') ? ' has-error ' : ''}}">
					<input type="number" class="sumar_mujeres form-control" id="rom_gitano_mujeres" name="rom_gitano_mujeres" value="{{$estudiantes->rom_gitano_mujeres}}" placeholder="Rom (Gitano) Mujeres">
					@if ($errors->has('rom_gitano_mujeres'))
			          <span>
			            <strong>{{ $errors->first('rom_gitano_mujeres') }}</strong>
			          </span>
			      	@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-xs-4">
				<label>Criollos</label>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('criollo_hombres') ? ' has-error ' : ''}}">
					<input type="number" class="sumar_hombres form-control" id="criollo_hombres" name="criollo_hombres" value="{{$estudiantes->criollo_hombres}}" placeholder="Criollos Hombres" autofocus>
					@if ($errors->has('criollo_hombres'))
	          			<span>
	          			  <strong>{{ $errors->first('criollo_hombres') }}</strong>
	          			</span>
	      			@endif
				</div>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('criollo_mujeres') ? ' has-error ' : ''}}">
					<input type="number" class="sumar_mujeres form-control" id="criollo_mujeres" name="criollo_mujeres" value="{{$estudiantes->criollo_mujeres}}" placeholder="Criollos Mujeres">
					@if ($errors->has('criollo_mujeres'))
			          <span>
			            <strong>{{ $errors->first('criollo_mujeres') }}</strong>
			          </span>
			      	@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-xs-4">
				<label>Amerindios</label>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('amerindio_hombres') ? ' has-error ' : ''}}">
					<input type="number" class="sumar_hombres form-control" id="amerindio_hombres" name="amerindio_hombres" value="{{$estudiantes->amerindio_hombres}}" placeholder="Amerindios Hombres" autofocus>
					@if ($errors->has('amerindio_hombres'))
	          			<span>
	          			  <strong>{{ $errors->first('amerindio_hombres') }}</strong>
	          			</span>
	      			@endif
				</div>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('amerindio_mujeres') ? ' has-error ' : ''}}">
					<input type="number" class="sumar_mujeres form-control" id="amerindio_mujeres" name="amerindio_mujeres" value="{{$estudiantes->amerindio_mujeres}}" placeholder="Amerindios Mujeres">
					@if ($errors->has('amerindio_mujeres'))
			          <span>
			            <strong>{{ $errors->first('amerindio_mujeres') }}</strong>
			          </span>
			      	@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-xs-4">
				<label>Polinesios</label>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('polinesio_hombres') ? ' has-error ' : ''}}">
					<input type="number" class="sumar_hombres form-control" id="polinesio_hombres" name="polinesio_hombres" value="{{$estudiantes->polinesio_hombres}}" placeholder="Polinesios Hombres" autofocus>
					@if ($errors->has('polinesio_hombres'))
	          			<span>
	          			  <strong>{{ $errors->first('polinesio_hombres') }}</strong>
	          			</span>
	      			@endif
				</div>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('polinesio_mujeres') ? ' has-error ' : ''}}">
					<input type="number" class="sumar_mujeres form-control" id="polinesio_mujeres" name="polinesio_mujeres" value="{{$estudiantes->polinesio_mujeres}}" placeholder="Polinesios Mujeres">
					@if ($errors->has('polinesio_mujeres'))
			          <span>
			            <strong>{{ $errors->first('polinesio_mujeres') }}</strong>
			          </span>
			      	@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-xs-4">
				<label>Melanesios</label>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('melanesio_hombres') ? ' has-error ' : ''}}">
					<input type="number" class="sumar_hombres form-control" id="melanesio_hombres" name="melanesio_hombres" value="{{$estudiantes->melanesio_hombres}}" placeholder="Melanesios Hombres" autofocus>
					@if ($errors->has('melanesio_hombres'))
	          			<span>
	          			  <strong>{{ $errors->first('melanesio_hombres') }}</strong>
	          			</span>
	      			@endif
				</div>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('melanesio_mujeres') ? ' has-error ' : ''}}">
					<input type="number" class="sumar_mujeres form-control" id="melanesio_mujeres" name="melanesio_mujeres" value="{{$estudiantes->melanesio_mujeres}}" placeholder="Melanesios Mujeres">
					@if ($errors->has('melanesio_mujeres'))
			          <span>
			            <strong>{{ $errors->first('melanesio_mujeres') }}</strong>
			          </span>
			      	@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-xs-4">
				<label>Asiáticos</label>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('asiatico_hombres') ? ' has-error ' : ''}}">
					<input type="number" class="sumar_hombres form-control" id="asiatico_hombres" name="asiatico_hombres" value="{{$estudiantes->asiatico_hombres}}" placeholder="Asiáticos Hombres" autofocus>
					@if ($errors->has('asiatico_hombres'))
	          			<span>
	          			  <strong>{{ $errors->first('asiatico_hombres') }}</strong>
	          			</span>
	      			@endif
				</div>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('asiatico_mujeres') ? ' has-error ' : ''}}">
					<input type="number" class="sumar_mujeres form-control" id="asiatico_mujeres" name="asiatico_mujeres" value="{{$estudiantes->asiatico_mujeres}}" placeholder="Asiáticos Mujeres">
					@if ($errors->has('asiatico_mujeres'))
			          <span>
			            <strong>{{ $errors->first('asiatico_mujeres') }}</strong>
			          </span>
			      	@endif
				</div>
			</div>
		</div>
		<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<p><strong>Si no encuentras un grupo étnico envíanos un correo con esta novedad</strong></p>
				</div>
			</div>
		<div class="row">
			<div class="col-md-4 col-xs-4">
				<label>Victimas</label>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('victimas_hombres') ? ' has-error ' : ''}}">
					<input type="number" id="victimas_hombres" name="victimas_hombres" class="form-control" value="{{$estudiantes->victimas_hombres}}" placeholder="Victimas Hombres" autofocus>
					@if ($errors->has('victimas_hombres'))
			          <span>
			            <strong>{{ $errors->first('victimas_hombres') }}</strong>
			          </span>
			      	@endif
				</div>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('victimas_mujeres') ? ' has-error ' : ''}}">
					<input type="number" id="victimas_mujeres" name="victimas_mujeres" class="form-control" value="{{$estudiantes->victimas_mujeres}}" placeholder="Victimas Mujeres">
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
					<input type="number" id="excombatientes_hombres" name="excombatientes_hombres" class="form-control" value="{{$estudiantes->excombatientes_hombres}}" placeholder="Victimas Hombres" autofocus>
					@if ($errors->has('excombatientes_hombres'))
			          <span>
			            <strong>{{ $errors->first('excombatientes_hombres') }}</strong>
			          </span>
			      	@endif
				</div>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('excombatientes_mujeres') ? ' has-error ' : ''}}">
					<input type="number" id="excombatientes_mujeres" name="excombatientes_mujeres" class="form-control" value="{{$estudiantes->excombatientes_mujeres}}" placeholder="Victimas Mujeres">
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
					<input type="number" id="desplazados_hombres" name="desplazados_hombres" class="form-control" value="{{$estudiantes->desplazados_hombres}}" placeholder="Desplazados Hombres" autofocus>
					@if ($errors->has('desplazados_hombres'))
			          <span>
			            <strong>{{ $errors->first('desplazados_hombres') }}</strong>
			          </span>
			      	@endif
				</div>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('desplazados_mujeres') ? ' has-error ' : ''}}">
					<input type="number" id="desplazados_mujeres" name="desplazados_mujeres" class="form-control" value="{{$estudiantes->desplazados_mujeres}}" placeholder="Desplazados Mujeres">
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
					<input type="number" id="pobreza_hombres" name="pobreza_hombres" class="form-control" value="{{$estudiantes->pobreza_hombres}}" placeholder="Probreza Hombres" autofocus>
					@if ($errors->has('pobreza_hombres'))
			          <span>
			            <strong>{{ $errors->first('pobreza_hombres') }}</strong>
			          </span>
			      	@endif
				</div>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('pobreza_mujeres') ? ' has-error ' : ''}}">
					<input type="number" id="pobreza_mujeres" name="pobreza_mujeres" class="form-control" value="{{$estudiantes->pobreza_mujeres}}" placeholder="Pobreza Mujeres">
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
					<input type="number" id="cabeza_hombres" name="cabeza_hombres" class="form-control" value="{{$estudiantes->cabeza_hombres}}" placeholder="Cabeza de familia hombres" autofocus>
					@if ($errors->has('cabeza_hombres'))
			          <span>
			            <strong>{{ $errors->first('cabeza_hombres') }}</strong>
			          </span>
			      	@endif
				</div>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('cabeza_mujeres') ? ' has-error ' : ''}}">
					<input type="number" id="cabeza_mujeres" name="cabeza_mujeres" class="form-control" value="{{$estudiantes->cabeza_mujeres}}" placeholder="Cabeza de familia mujeres">
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
					<input type="number" id="certificados_hombres" name="certificados_hombres" class="form-control" value="{{$estudiantes->certificados_hombres}}" placeholder="Estudiantes Certificados Hombres" autofocus>
					@if ($errors->has('certificados_hombres'))
			          <span>
			            <strong>{{ $errors->first('certificados_hombres') }}</strong>
			          </span>
			      	@endif
				</div>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('certificados_mujeres') ? ' has-error ' : ''}}">
					<input type="number" id="certificados_mujeres" name="certificados_mujeres" class="form-control" value="{{$estudiantes->certificados_mujeres}}" placeholder="Estudiantes certificados Mujeres">
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
					<input type="number" id="egresados_programa_hombres" name="egresados_programa_hombres" class="form-control" value="{{$estudiantes->egresados_programa_hombres}}" placeholder="Estudiantes Certificados Hombres" autofocus>
					@if ($errors->has('egresados_programa_hombres'))
			          <span>
			            <strong>{{ $errors->first('egresados_programa_hombres') }}</strong>
			          </span>
			      	@endif
				</div>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('egresados_programa_mujeres') ? ' has-error ' : ''}}">
					<input type="number" id="egresados_programa_mujeres" name="egresados_programa_mujeres" class="form-control" value="{{$estudiantes->egresados_programa_mujeres}}" placeholder="Estudiantes certificados Mujeres">
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
					<input type="number" id="egresados_trabajo_hombres" name="egresados_trabajo_hombres" class="form-control" value="{{$estudiantes->egresados_trabajo_hombres}}" placeholder="Estudiantes Certificados Hombres" autofocus>
					@if ($errors->has('egresados_trabajo_hombres'))
			          <span>
			            <strong>{{ $errors->first('egresados_trabajo_hombres') }}</strong>
			          </span>
			      	@endif
				</div>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('egresados_trabajo_mujeres') ? ' has-error ' : ''}}">
					<input type="number" id="egresados_trabajo_mujeres" name="egresados_trabajo_mujeres" class="form-control" value="{{$estudiantes->egresados_trabajo_mujeres}}" placeholder="Estudiantes certificados Mujeres">
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
					<input type="number" id="egresados_trabajo_otro_hombres" name="egresados_trabajo_otro_hombres" class="form-control" value="{{$estudiantes->egresados_trabajo_otro_hombres}}" placeholder="Estudiantes Certificados Hombres" autofocus>
					@if ($errors->has('egresados_trabajo_otro_hombres'))
			          <span>
			            <strong>{{ $errors->first('egresados_trabajo_otro_hombres') }}</strong>
			          </span>
			      	@endif
				</div>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('egresados_trabajo_otro_mujeres') ? ' has-error ' : ''}}">
					<input type="number" id="egresados_trabajo_otro_mujeres" name="egresados_trabajo_otro_mujeres" class="form-control" value="{{$estudiantes->egresados_trabajo_otro_mujeres}}" placeholder="Estudiantes certificados Mujeres">
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
					<input type="number" id="egresados_desempleados_hombres" name="egresados_desempleados_hombres" class="form-control" value="{{$estudiantes->egresados_desempleados_hombres}}" placeholder="Estudiantes Certificados Hombres" autofocus>
					@if ($errors->has('egresados_desempleados_hombres'))
			          <span>
			            <strong>{{ $errors->first('egresados_desempleados_hombres') }}</strong>
			          </span>
			      	@endif
				</div>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="form-group {{ $errors->has('egresados_desempleados_mujeres') ? ' has-error ' : ''}}">
					<input type="number" id="egresados_desempleados_mujeres" name="egresados_desempleados_mujeres" class="form-control" value="{{$estudiantes->egresados_desempleados_mujeres}}" placeholder="Estudiantes certificados Mujeres">
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
					<textarea maxlength="500" id="causas_desercion" name="causas_desercion" class="form-control">{{$estudiantes->causas_desercion}}</textarea>
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
					<textarea maxlength="500" id="observaciones" name="observaciones" class="form-control">{{$estudiantes->observaciones}}</textarea>
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