<nav class="navbar navbar-inverse bg-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="{{ url('/') }}">Nutriboot</a>
	    </div>

	    <ul class="nav navbar-nav navbar-right">
	      <li><a href="{{ route('login') }}"><span class="glyphicon .glyphicon-log-in"></span> Login</a></li>
				{{-- Esta linea es para el registro pero aun no esta definido si lo vamos a hacer por afuera 
				<li><a href="{{ route('register')}}"><span class="glyphicon .glyphicon-user"></span> Registro</a></li>
				--}}
	    </ul>
	  </div>
</nav>
