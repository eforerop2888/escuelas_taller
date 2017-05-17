@extends('layouts.principal')
@section('title', 'Crear Cooperante')
@section('subtitle', 'CREAR COOPERANTE')
@section('content')
	{{Form::open(['route' => 'cooperantes.store', 'method' => 'POST', 'id' => 'form-crear-cooperante'])}}
		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('nombre_cooperante') ? ' has-error ' : ''}}">
					<label for="nombre_cooperante">Nombre de cooperante</label>
					<input type="text" id="nombre_cooperante" name="nombre_cooperante" class="form-control" required placeholder="Nombre de cooperante" autofocus>
					@if ($errors->has('nombre_cooperante'))
            <span>
              <strong>{{ $errors->first('nombre_cooperante') }}</strong>
            </span>
        	@endif
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('persona_contacto') ? ' has-error ' : ''}}">
					<label for="persona_contacto">Persona de contacto</label>
					<input type="text" id="persona_contacto" name="persona_contacto" class="form-control" required placeholder="Persona de contacto">
					@if ($errors->has('persona_contacto'))
			            <span>
			              <strong>{{ $errors->first('persona_contacto') }}</strong>
			            </span>
		        	@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('mail_contacto') ? ' has-error ' : ''}}">
					<label for="mail_contacto">Mail del contacto</label>
					<input type="email" id="mail_contacto" name="mail_contacto" class="form-control" required placeholder="Mail del contacto">
					@if ($errors->has('mail_contacto'))
			            <span>
			              <strong>{{ $errors->first('mail_contacto') }}</strong>
			            </span>
		        	@endif
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('programa') ? ' has-error ' : ''}}">
					<label for="programa">Programa en el que coopera</label>
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
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('tipo_cooperacion') ? ' has-error ' : ''}}">
					<label for="tipo_cooperacion">Tipo de cooperación</label>
					<textarea id="tipo_cooperacion" name="tipo_cooperacion" class="form-control" required></textarea>
					@if ($errors->has('tipo_cooperacion'))
			            <span>
			              <strong>{{ $errors->first('tipo_cooperacion') }}</strong>
			            </span>
			      	@endif
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('resultados_significativos') ? ' has-error ' : ''}}">
					<label for="resultados_significativos">Resultados más significativos</label>
					<textarea id="resultados_significativos" name="resultados_significativos" class="form-control" required></textarea>
					@if ($errors->has('resultados_significativos'))
			            <span>
			              <strong>{{ $errors->first('resultados_significativos') }}</strong>
			            </span>
		        	@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<button type="submit" class="btn btn-default">Guardar</button>
			</div>
		</div>
	{{Form::close()}}
@endsection