<nav class="navbar navbar-inverse bg-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="{{ route('home') }}">Nutriboot</a>
	    </div>

	    <ul class="nav navbar-nav">

				@if (Auth::user()->perfil->nombre == 'Administrador')
					<li><a href="{{ route('usuario.index') }}"><span class="glyphicon glyphicon-user"></span> Usuarios</a></li>
		      <li><a href="{{ route('escuela.index') }}"><span class="glyphicon glyphicon-home"></span> Escuelas</a></li>
					<li><a href="{{ route('categoria.index') }}"><span class="glyphicon glyphicon-tasks"></span> Categoria</a></li>
		      <li><a href="{{ route('tipoComida.index') }}"><span class="glyphicon glyphicon-leaf"></span> Tipo de Comida</a></li>
					<li><a href="{{ route('estacion.index') }}"><span class="glyphicon glyphicon-stats"></span> Estación</a></li>
					<li><a href="{{ route('insumo.index') }}"><span class="glyphicon glyphicon-apple"></span> Insumos</a></li>
				@else
		      <li><a href="{{ route('alumno.index') }}"><span class="glyphicon glyphicon-edit"></span> Alumnos</a></li>
		      <li><a href="{{ route('proveedor.index') }}"><span class="glyphicon glyphicon-shopping-cart"></span> Proveedores</a></li>
		      <li><a href=""><span class="glyphicon glyphicon-apple"></span> Insumos</a></li>
		      <li><a href="#"><span class="glyphicon glyphicon-cutlery"></span> Comida</a></li>
					<li><a href="#"><span class="glyphicon glyphicon-list"></span> Plan Nutricional</a></li>
				@endif
		  </ul>



	    <ul class="nav navbar-nav navbar-right">

				<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
							{{ Auth::user()->nombre }} <span class="caret"></span>
						</a>

						<ul class="dropdown-menu">
								<li>
										<a href="{{ route('logout') }}"
												onclick="event.preventDefault();
																 document.getElementById('logout-form').submit();">
												Salir
										</a>

										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
												{{ csrf_field() }}
										</form>
								</li>
						</ul>
				</li>

	    </ul>

	  </div>
</nav>
