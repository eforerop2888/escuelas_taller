@extends('layouts.secundario')
@section('title', 'Informes')
@section('subtitle', 'INFORMES')
@section('content')
{!! Charts::assets() !!}
	<div class="panel panel-primary">
		<div class="panel-heading">
			INFORMES ESPECIFICOS
		</div>
		<div class="panel-body">
		{{Form::open(['route' => ['informes.informeespecifico'], 'method' => 'POST', 'id' => 'form-listar-escuelas'])}}
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="pais">Seleccione País</label>
						<select name="pais" id="pais" class="form-control">
							<option value="0">Seleccione</option>
							@foreach($paises as $rowpaises)
								<option value="{{$rowpaises->id}}">{{ucfirst($rowpaises->pais)}}</option>
							@endforeach
						</select>
						@if ($errors->has('pais'))
				            <span>
				              <strong>{{ $errors->first('pais') }}</strong>
				            </span>
		        		@endif
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="escuela">Seleccione Escuela</label>
						<select name="escuela" id="escuela" class="form-control">
							<option value="0">Seleccione</option>
						</select>
						@if ($errors->has('escuela'))
				            <span>
				              <strong>{{ $errors->first('escuela') }}</strong>
				            </span>
		        		@endif
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label for="tipo_informe">Tipo de informe</label>
						<select name="tipo_informe" id="tipo_informe" class="form-control">
							<option value="0">Seleccione</option>
							@if(Auth::user()->role_id == 1)
								<option value="1">Cooperantes</option>
								<option value="2">Cursos</option>
							@endif	
							<option value="3">Estudiantes</option>
							<option value="4">Programas</option>
						</select>
						@if ($errors->has('tipo_informe'))
				            <span>
				              <strong>{{ $errors->first('tipo_informe') }}</strong>
				            </span>
		        		@endif
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<input type="hidden" name="token" id="token" value="{{csrf_token()}}">
					<button type="submit" class="btn btn-primary">
						<i class="fa fa-file-excel-o" aria-hidden="true"></i>
						Generar Informe
					</button>
				</div>
			</div>
		{{Form::close()}}
		</div>
	</div>
	<div class="panel panel-success">
		<div class="panel-heading">
			INFORME GENERAL
		</div>
		<div class="panel-body">
			<div class="table-responsive">			
				<div class="row">
					<div class="col-md-6">
				 		{!! $chartEscuelas->render() !!}
				 	</div>
				 	<div class="col-md-6">
				 		{!! $chartProgramas->render() !!}
				 	</div>
				</div>
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-10">
				 		{!! $chartPoblaciones->render() !!}
				 	</div>
				 	<div class="col-md-1"></div>
				</div>
				<div class="row">
					<div class="col-md-1"></div>
				 	<div class="col-md-10">
				 		{!! $chartAnos->render() !!}
				 	</div>
				 	<div class="col-md-1"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-warning">
		<div class="panel-heading">
			Gráficas especificas
		</div>
		<div class="panel-body">
			{{Form::open(['route' => ['informes.graficoespecifico'], 'method' => 'POST', 'id' => 'form-listar-escuelas'])}}
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="pais">Seleccione País</label>
							<select name="pais" id="pais" class="form-control">
								@foreach($paises as $rowpaises)
									<option value="{{$rowpaises->id}}">{{ucfirst($rowpaises->pais)}}</option>
								@endforeach
							</select>
							@if ($errors->has('pais'))
					            <span>
					              <strong>{{ $errors->first('pais') }}</strong>
					            </span>
			        		@endif
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<input type="hidden" name="token" id="token" value="{{csrf_token()}}">
						<button type="submit" class="btn btn-primary">
							<i class="fa fa-area-chart" aria-hidden="true"></i>
							Generar Gráficas
						</button>
					</div>
				</div>
			{{Form::close()}}
		</div>
	</div>
@endsection
@section('scripts')
	<script type="text/javascript">
		$('#pais').change(function(e){
			$.ajax({
	            type: "POST",
	            url: "listaescuelas",
	            data: {pais : $('#pais').val(), _token : $('#token').val()},
	            dataType: "json",
	            success: function(respuesta) {
	            	$('#escuela').empty();
	            	$('#escuela').append('<option value="0">Seleccione</option>' );
	            	var i = 0;
	            	$.each(respuesta, function( index, value ) {
					  $('#escuela').append('<option value="' + respuesta[i].id + '">'+respuesta[i].nombre+'</option>' );
					  i++;
					});
	            }
	        });
			e.preventDefault();
		});
	</script>
@endsection