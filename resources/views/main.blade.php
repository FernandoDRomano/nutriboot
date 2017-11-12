<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title> @yield('title','Default') | Home </title>
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
</head>
<body>
	<section>
			@include('navInicial')
	</section>
	<section>
		<div class="row">
  			<div class="col-md-10 col-md-offset-1">

						@yield('contenido')

  			</div>
		</div>
	</section>

	<script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
	<script src="{{ asset('plugins/jquery/jquery-2.1.4.js') }}"></script>
</body>
</html>
