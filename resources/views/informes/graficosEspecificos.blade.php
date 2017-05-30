@extends('layouts.principal')
@section('title', 'Graficos Especificos')
@section('subtitle', 'Grafico Especifico')
@section('content')
	{!! Charts::assets() !!}
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
@endsection