@extends('layouts.principal')
@section('title', 'Editar Escuela')
@section('subtitle', 'EDITAR ESCUELA')
@section('content')
	{{Form::open(['route' => ['escuelas.update', $escuela->id], 'method' => 'PUT', 'id' => 'form-editar-escuela'])}}
		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('nombre_escuela') ? ' has-error ' : ''}}">
					<label for="nombre_escuela">Nombre Escuela</label>
					<input type="text" id="nombre_escuela" name="nombre_escuela" class="form-control" required placeholder="Nombre Escuela" autofocus value="{{$escuela->nombre}}">
					@if ($errors->has('nombre_escuela'))
	          <span>
	            <strong>{{ $errors->first('nombre_escuela') }}</strong>
	          </span>
	      	@endif
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('pagina_web') ? ' has-error ' : ''}}">
					<label for="pagina_web">Página web</label>
					<input type="text" id="pagina_web" name="pagina_web" class="form-control" placeholder="Página Web" value="{{$escuela->pagina_web}}">
					@if ($errors->has('pagina_web'))
	          <span>
	            <strong>{{ $errors->first('pagina_web') }}</strong>
	          </span>
	      	@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('direccion') ? ' has-error ' : ''}}">
					<label for="direccion">Dirección</label>
					<input type="text" id="direccion" name="direccion" class="form-control" required placeholder="Dirección" value="{{$escuela->direccion}}">
					@if ($errors->has('direccion'))
	          <span>
	            <strong>{{ $errors->first('direccion') }}</strong>
	          </span>
	      	@endif
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('telefono') ? ' has-error ' : ''}}">
					<label for="telefono">Teléfono</label>
					<a href="#" class="tooltips" title="Ingresa el número con prefijo de tu país y código de área. Ej: +571 3283787">
						<i class="fa fa-question-circle" aria-hidden="true"></i>
					</a>
					<input type="text" id="telefono" name="telefono" class="form-control" required placeholder="Teléfono" value="{{$escuela->telefono}}"}}"">
					@if ($errors->has('telefono'))
	          <span>
	            <strong>{{ $errors->first('telefono') }}</strong>
	          </span>
	      	@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('director') ? ' has-error ' : ''}}">
					<label for="director">Director | Coordinador General</label>
					<input type="text" id="director" name="director" class="form-control" required placeholder="Director | Coordinador" value="{{$escuela->director}}">
					@if ($errors->has('director'))
	          <span>
	            <strong>{{ $errors->first('director') }}</strong>
	          </span>
	      	@endif
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('email') ? ' has-error ' : ''}}">
					<label for="email">Email Director | Coordinador General</label>
					<input type="email" id="email" name="email" class="form-control" required placeholder="Email Director | Coordinador" value="{{$escuela->director_email}}">
					@if ($errors->has('email'))
	          <span>
	            <strong>{{ $errors->first('email') }}</strong>
	          </span>
	      	@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('coordinador') ? ' has-error ' : ''}}">
					<label for="coordinador">Coordinador Académico</label>
					<input type="text" id="coordinador" name="coordinador" class="form-control" required placeholder="Coordinador Academico" value="{{$escuela->coordinador}}">
					@if ($errors->has('coordinador'))
	          <span>
	            <strong>{{ $errors->first('coordinador') }}</strong>
	          </span>
	      	@endif
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('email_c') ? ' has-error ' : ''}}">
					<label for="email_c">Email Coordinador Académico</label>
					<input type="email" id="email_c" name="email_c" class="form-control" required placeholder="Email Coordinador Academico" value="{{$escuela->coordinador_email}}">
					@if ($errors->has('email_c'))
	          <span>
	            <strong>{{ $errors->first('email_c') }}</strong>
	          </span>
	      	@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('humano') ? ' has-error ' : ''}}">
					<label for="humano">Coordinador Componenete Humano</label>
					<a href="#" class="tooltips" title="Persona encargada de interactuar con los estudiantes y hacer seguimiento sobre el proceso de formación de cada uno.">
						<i class="fa fa-question-circle" aria-hidden="true"></i>
					</a>
					<input type="text" id="humano" name="humano" class="form-control" required placeholder="Coordinador Academico" value="{{$escuela->coordinador_humano}}">
					@if ($errors->has('humano'))
	          <span>
	            <strong>{{ $errors->first('humano') }}</strong>
	          </span>
	      	@endif
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('email_h') ? ' has-error ' : ''}}">
					<label for="email_h">Email Coordinador Componenete Humano</label>
					<input type="email" id="email_h" name="email_h" class="form-control" required placeholder="Email Coordinador Componente Humano" value="{{$escuela->coordinador_humano_email}}">
					@if ($errors->has('email_h'))
	          <span>
	            <strong>{{ $errors->first('email_h') }}</strong>
	          </span>
	      	@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group {{ $errors->has('acto') ? ' has-error ' : ''}}">
					<label for="acto">Acto Administrativo</label>
					<a href="#" class="tooltips" title="Se refiere a aquella declaración voluntaria que el estado u organismo público realiza y que tiene efectos jurídicos individuales de manera inmediata. ">
						<i class="fa fa-question-circle" aria-hidden="true"></i>
					</a>
					<input type="text" id="acto" name="acto" class="form-control" required placeholder="Acto Administrativo" value="{{$escuela->acto_administrativo}}">
					@if ($errors->has('acto'))
	          <span>
	            <strong>{{ $errors->first('acto') }}</strong>
	          </span>
	      	@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group {{ $errors->has('pais_id') ? ' has-error ' : ''}}">
					<label for="pais_id">País</label>
					<select id="pais_id" name="pais_id" class="form-control" required>
						@foreach ($paises as $rowpaises)
							@if($escuela->pais_id == $rowpaises->id)
								<option value="{{$rowpaises->id}}" selected="selected">{{ucfirst($rowpaises->pais)}}</option>
							@else
								@if(Auth::user()->role_id == 1)
									<option value="{{$rowpaises->id}}">{{ucfirst($rowpaises->pais)}}</option>
								@endif
							@endif
						@endforeach
					</select>
					@if ($errors->has('pais_id'))
	          <span>
	            <strong>{{ $errors->first('pais_id') }}</strong>
	          </span>
	      	@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<button type="submit" class="btn btn-primary">
					<i class="fa fa-floppy-o" aria-hidden="true"></i>
					Guardar
				</button>
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
