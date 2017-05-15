@extends('layouts.principal')
@section('title', 'Crear Escuela')
@section('content')
	<div class="row">
			{{Form::open(['route' => 'escuelas.store', 'method' => 'POST', 'id' => 'form-crear-escuela'])}}
			<div class="col-md-6">
				<div class="form-group">
					<label for="direccion">Dirección</label>
					<input type="text" id="direccion" name="direccion" class="form-control" placeholder="Dirección">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="telefono">Teléfono</label>
					<input type="text" id="telefono" name="telefono" class="form-control" placeholder="Teléfono">
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<label for="pagina_web">Página web</label>
					<input type="text" id="pagina_web" name="pagina_web" class="form-control" placeholder="Página Web">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="director">Director | Coordinador</label>
					<input type="text" id="director" name="director" class="form-control" placeholder="Director | Coordinador">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="email">Email Director | Coordinador</label>
					<input type="email" id="email" name="email" class="form-control" placeholder="Director | Coordinador">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="coordinador">Coordinador Academico</label>
					<input type="text" id="coordinador" name="coordinador" class="form-control" placeholder="Coordinador Academico">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="email_c">Email Coordinador Academico</label>
					<input type="email" id="email_c" name="email_c" class="form-control" placeholder="Email Coordinador Academico">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="humano">Coordinador Componenete Humano</label>
					<input type="text" id="humano" name="humano" class="form-control" placeholder="Coordinador Academico">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="email_h">Email Coordinador Componenete Humano</label>
					<input type="email" id="email_h" name="email_h" class="form-control" placeholder="Email Coordinador Componente Humano">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="humano">Acto Administrativo</label>
					<input type="text" id="acto" name="acto" class="form-control" placeholder="Acto Administrativo">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="permiso">Quien otroga el permiso</label>
					<input type="texy" id="permiso" name="permiso" class="form-control" placeholder="Quien otroga el permiso">
				</div>
			</div>
			{{Form::close()}}
		</div>
	</div>
@endsection