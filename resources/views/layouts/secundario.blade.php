<!DOCTYPE html>
<html>
<head>
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
	<script type="text/javascript" src="{{URL::asset('js/main.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('js/jquery.poshytip.js')}}"></script>
	<title>@yield('title') | Escuelas Taller</title>
</head>
<body>
	<div class="container-fluid">
		@include('layouts.menu')
		<div class="contenido">
			@include('layouts.mensajes')
			@yield('content')
		</div>
	</div>
</body>
<script type="text/javascript" src="{{URL::asset('js/main.js')}}"></script>
@yield('scripts')
</html>