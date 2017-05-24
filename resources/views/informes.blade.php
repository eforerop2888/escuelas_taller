@extends('layouts.secundario')
@section('title', 'Informes')
@section('subtitle', 'INFORMES')
@section('content')
{!! Charts::assets() !!}
	<div class="panel panel-primary">
		<div class="panel-heading">
			INFORME GENERAL
		</div>
		<div class="panel-body">			
			<div class="row">
				<div class="col-md-6">
			 		{!! $chartEscuelas->render() !!}
			 	</div>
			 	<div class="col-md-6">
			 		{!! $chartProgramas->render() !!}
			 	</div>
			</div>
			<div class="row">
				<div class="col-md-6">
			 		{!! $chartPoblaciones->render() !!}
			 	</div>
			 	<div class="col-md-6">
			 		{!! $chartAnos->render() !!}
			 	</div>
			</div>
		</div>
	</div>

	<div class="panel panel-success">
		<div class="panel-heading">
			INFORMES ESPECIFICOS
		</div>
		<div class="panel-body">			
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="pais">Seleccione País</label>
						<select name="pais" id="pais" class="form-control">
							@foreach($paises as $rowpaises)
								<option value="{{$rowpaises->id}}">{{ucfirst($rowpaises->pais)}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="escuela">Seleccione Escuela</label>
						<select name="escuela" id="escuela" class="form-control">
							<option></option>
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label for="informe">Tipo de informe</label>
						<select name="pais" id="pais" class="form-control">
							<option value="1">Escuelas</option>
							<option value="2">Programas</option>
							<option value="3">Estudiantes</option>
							<option value="4">Cooperantes</option>
							<option value="5">Cursos</option>
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<button type="submit" class="btn btn-primary">
						Generar Informe <i class="fa fa-edit" aria-hidden="true"></i>
					</button>
				</div>
			</div>
		</div>
	</div>
@endsection