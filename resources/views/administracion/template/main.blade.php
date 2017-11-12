<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title> @yield('title','Panel de Administracion') </title>
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css " >
</head>
<body>
	<section>
		@include('administracion.template.partials.navAdministrador')
	</section>
	<section>
		<div class="row">
  			<div class="col-md-10 col-md-offset-1">
					@include('flash::message')
  				@yield('contenido')
  			</div>
		</div>
	</section>

	<script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
	<script src="{{ asset('plugins/jquery/jquery-2.1.4.js') }}"></script>
	<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
