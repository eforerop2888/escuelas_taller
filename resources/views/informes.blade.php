@extends('layouts.principal')
@section('title', 'Informes')
@section('subtitle', 'INFORMES')
@section('content')
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
@endsection