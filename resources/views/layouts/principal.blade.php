<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="{{URL::asset('css/normalize.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::asset('css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::asset('css/siderbar.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::asset('css/style.css')}}">
	<script type="text/javascript" src="{{URL::asset('js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('js/siderbar.js')}}"></script>
	<title>@yield('title') | Escuelas Taller</title>
</head>
<body>
	<div class="container-fluid">
		@include('layouts.menu')
		<div class="contenido">
			<div class="row">
				<div class="col-md-12">
					<h2>@yield('subtitle')</h2>
				</div>
			</div>
			@yield('content')
		</div>
	</div>
</body>
@yield('scripts')
</html>
