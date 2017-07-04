@extends('layouts.principal')
@section('title', 'Listado de reportes')
@section('subtitle', 'LISTADO DE REPORTES')
@section('content')
	<div class="table-responsive">
		<table class="table table-hover">
			<tr>
				<th>Reporte</th>
				<th>Fecha</th>
				<th>Estado</th>
				<th>Descargar</th>
			</tr>
			<tr>
				@foreach($reportes as $rowreportes)
					<tr>
						<td>{{$rowreportes->nombre_archivo}}</td>
						<td>{{$rowreportes->created_at}}</td>
						<td>
							@if($rowreportes->estado == 1)
								Publicado
								@else	
								No publicado
							@endif
						</td>
						<td>
							<a href="{{URL::asset('reportes_files')}}/{{$rowreportes->ruta}}" target="_blank">
								<i class="fa fa-file-text fa-2x" aria-hidden="true"></i>
							</a>
						</td>
					</tr>
				@endforeach
			</tr>
		</table>
	</div>
@endsection
