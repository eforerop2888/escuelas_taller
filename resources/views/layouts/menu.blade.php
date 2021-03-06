<nav class="navbar navbar-default nav_e" role="navigation">
		<div class="navbar-header">
			<a id="menu-toggle" href="#" class="navbar-toggle">
				<span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
			</a>
			<a class="navbar-brand" href="{{route('informes')}}">
				<img id="logo" src="{{URL::asset('logo.png')}}">
			</a>
		</div>
		<span class="user_name">
			<a href="{{URL::asset('manual.pdf')}}" class="manual_uso" target="_blank">
				<i class="fa fa-question-circle" aria-hidden="true"></i>
			</a>
			{{ Auth::user()->name }}
		</span>
		<div id="sidebar-wrapper" class="sidebar-toggle">
			<ul class="sidebar-nav">
		    	<li>
		    		<a href="#">
		    			<i class="fa fa-building" aria-hidden="true"></i>
 						Escuelas
 					</a>
		      		<ul>
		      			<li>
		      				<a href="{{route('escuelas.create')}}">
		      					<i class="fa fa-pencil" aria-hidden="true"></i>
		      					Crear
		      				</a>
		      			</li>
		      			<li>
		      				<a href="{{route('escuelas.index')}}">
		      					<i class="fa fa-list-ol" aria-hidden="true"></i>
		      					Listar
		      				</a>
		      			</li>
		      		</ul>
		    	</li>
		    	<li>
	      			<a href="#">
	      				<i class="fa fa-book" aria-hidden="true"></i>
	      				Programas
	      			</a>
	      			<ul>
		      			<li>
		      				<a href="{{route('programas.create')}}">
		      					<i class="fa fa-pencil" aria-hidden="true"></i>
		      					Crear
		      				</a>
		      			</li>
		      			<li>
		      				<a href="{{route('programas.index')}}">
		      					<i class="fa fa-list-ol" aria-hidden="true"></i>
		      					Listar
		      				</a>
		      			</li>
		      		</ul>
		    	</li>
		    	<li>
	      			<a href="#">
	      				<i class="fa fa-handshake-o" aria-hidden="true"></i>
	      				Cooperantes
	      			</a>
	      			<ul>
		      			<li>
		      				<a href="{{route('cooperantes.create')}}">
		      					<i class="fa fa-pencil" aria-hidden="true"></i>
		      					Crear
		      				</a>
		      			</li>
		      			<li>
		      				<a href="{{route('cooperantes.index')}}">
		      					<i class="fa fa-list-ol" aria-hidden="true"></i>
		      					Listar
		      				</a>
		      			</li>
		      		</ul>
		    	</li>
		    	<li>
	      			<a href="#">
	      				<i class="fa fa-university" aria-hidden="true"></i>
	      				Cursos Extensión
	      			</a>
	      			<ul>
		      			<li>
		      				<a href="{{route('cursos.create')}}">
		      					<i class="fa fa-pencil" aria-hidden="true"></i>
		      					Crear
		      				</a>
		      			</li>
		      			<li>
		      				<a href="{{route('cursos.index')}}">
		      					<i class="fa fa-list-ol" aria-hidden="true"></i>
		      					Listar
		      				</a>
		      			</li>
		      		</ul>
		    	</li>
		    	<li>
	      			<a href="#">
	      				<i class="fa fa-file-text" aria-hidden="true"></i>
	      				Reportes
	      			</a>
	      			<ul>
	      				@if(Auth::user()->role_id == 1)
			      			<li>
			      				<a href="{{route('reportes.create')}}">
			      					<i class="fa fa-pencil" aria-hidden="true"></i>
			      					Crear
			      				</a>
			      			</li>
			      		@endif
		      			<li>
		      				<a href="{{route('listareportes')}}">
		      					<i class="fa fa-list-ol" aria-hidden="true"></i>
		      					Listar
		      				</a>
		      			</li>
		      		</ul>
		    	</li>
		    	<li>
	      			<a href="{{route('informes')}}">
	      				<i class="fa fa-bar-chart" aria-hidden="true"></i>
	      				Informes
	      			</a>
		    	</li>
		    	@if(Auth::user()->role_id == 1)
		    	<li>
	      			<a href="#">
	      				<i class="fa fa-user-circle" aria-hidden="true"></i>
	      				Usuarios
	      			</a>
	      			<ul>
		      			<li>
		      				<a href="{{route('register')}}">
		      					<i class="fa fa-pencil" aria-hidden="true"></i>
		      					Crear
		      				</a>
		      			</li>
		      			<li>
		      				<a href="{{route('usuarios.index')}}">
		      					<i class="fa fa-list-ol" aria-hidden="true"></i>
		      					Listar
		      				</a>
		      			</li>
		      		</ul>
		    	</li>
		    	@endif
		    	<li>
		    		<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
		    			<i class="fa fa-times" aria-hidden="true"></i>
						Cerrar Sesión
		    		</a>
		    		<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
		    	</li>
		  	</ul>
		</div>
</nav>