<!DOCTYPE html>
<html>
<head>
	<meta name='viewport' content='width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1'>
	<link rel="stylesheet" type="text/css" href="{{URL::asset('css/normalize.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::asset('css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::asset('css/siderbar.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::asset('css/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::asset('css/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::asset('css/sweetalert2.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::asset('css/poshytip/tip-twitter.css')}}">
	<script type="text/javascript" src="{{URL::asset('js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('js/siderbar.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('js/sweetalert2.min.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('js/core.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('js/jquery.poshytip.js')}}"></script>
	<title>@yield('title') | Escuelas Taller</title>
</head>
<body>
	<div class="container-fluid">
		@include('layouts.menu')
		<div class="contenido">
			@include('layouts.mensajes')
			<div class="panel panel-primary">
				<div class="panel-heading">
					@yield('subtitle')
				</div>
				<div class="panel-body">
					@yield('content')
				</div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript" src="{{URL::asset('js/main.js')}}"></script>
@yield('scripts')
</html>
