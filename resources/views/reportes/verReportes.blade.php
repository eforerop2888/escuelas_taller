@extends('layouts.principal')
@section('title', 'Listado de reportes')
@section('subtitle')
	LISTADO DE REPORTES {{strtoupper($pais->pais)}}
@endsection
@section('content')
	@if($reportes->count())
		<div class="table-responsive">
			<table class="table table-hover">
				<tr>
					<th>Reporte</th>
					<th>Fecha</th>
					<th>Descargar</th>
					@if(Auth::user()->role_id == 1)
						<th>Eliminar</th>
					@endif
				</tr>
				<tr>
					@foreach($reportes as $rowreportes)
						<tr>
							<td>{{$rowreportes->nombre_archivo}}</td>
							<td>{{$rowreportes->created_at}}</td>
							<td>
								<a href="{{URL::asset('reportes_files')}}/{{$rowreportes->ruta}}" target="_blank">
									<i class="fa fa-file-text fa-2x" aria-hidden="true"></i>
								</a>
							</td>
							@if(Auth::user()->role_id == 1)
								<td>
									{{ Form::open(['method' => 'Delete', 'route' => ['reportes.destroy', $rowreportes->reporte_id], 'class' => 'form-eliminar']) }}
										<button type="submit" class="btn btn-danger">
											<i class="fa fa-eraser" aria-hidden="true" alt="borrar"></i>
										</button>
									{{ Form::close() }}
								</td>
							@endif
						</tr>
					@endforeach
				</tr>
			</table>
		</div>
		@else
			@include('layouts.msjNoRegistros')
	@endif
@endsection
