<nav class="navbar navbar-default" role="navigation">
		<div class="navbar-header">
			<a id="menu-toggle" href="#" class="navbar-toggle">
				<span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
			</a>
			<a class="navbar-brand" href="home.xhtml">
				<img id="logo" src="{{URL::asset('logo.png')}}">
			</a>
		</div>
		<span class="user_name">{{ Auth::user()->name }}</span>
		<div id="sidebar-wrapper" class="sidebar-toggle">
			<ul class="sidebar-nav">
		    	<li>
		    		<a href="#" class="escuelas_menu">Escuelas Taller</a>
	      			<a href="#" class="user_name_menu">{{ Auth::user()->name }}</a>
		      		<ul>
		      			<li>
		      				<a href="">Crear</a>
		      			</li>
		      			<li>
		      				<a href="">Listar</a>
		      			</li>
		      		</ul>
		    	</li>
		    	<li>
	      			<a href="#item2">Usuarios</a>
		    	</li>
		    	<li>
	      			<a href="#item3">Programas</a>
		    	</li>
		    	<li>
		    		<a href="{{route('logout')}}">Cerrar Sesión</a>
		    	</li>
		  	</ul>
		</div>
</nav>