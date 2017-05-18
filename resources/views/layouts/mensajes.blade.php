@if (Session::has('success'))
	<div class="alert alert-success" role="alert">
		<strong>Perfecto</strong> {{Session::get('success')}}
	</div>
@endif
@if (Session::has('fail'))
	<div class="alert alert-danger" role="alert">
		<strong>Error</strong> {{Session::get('fail')}}
	</div>
@endif