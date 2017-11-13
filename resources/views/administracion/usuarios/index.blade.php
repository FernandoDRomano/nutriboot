@extends('administracion.template.main')

@section('title','Gestion de Usuarios')

@section('contenido')

	<div class="row">
      <div class="form-group">
            <a href="{{ route('usuario.create') }}" class="btn btn-primary" role="button">Nuevo Usuario</a><br><br>
						{{-- Buscador de Escuelas --}}
						{{Form::open(['route'=>'usuario.index', 'method'=>'GET', 'class'=>'navbar-form pull-right' ])}}
								<div class="input-group">
									{{Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Buscar Usuarios..', 'aria-describedby' =>'search'])}}
									<span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
								</div>
						{{Form::close()}}
						{{-- Fin del Buscador --}}
			</div>


	<div class="row">
			<div class="col-md-12">
				<div class="panel panel-info">
						<div class="panel-heading text-center"><strong>Listado de Usuarios</strong></div>
								<table class="table table-bordered table-striped">
												<thead>
														<tr>
																<th>Id</th>
																<th>Usuario</th>
																<th>Nombre</th>
																<th>Email</th>
																<th>Dirección</th>
																<th>DNI</th>
																<th>Cargo</th>
																<th>Perfil</th>
																<th>Escuela</th>
																<th>Opciones</th>
														</tr>
												</thead>
												<tbody>

														@foreach ($usuarios as $usuario)
														<tr>
																<td> {{$usuario->id}} </td>
																<td> {{$usuario->nombreUsuario}} </td>
																<td> {{$usuario->nombre}} </td>
																<td> {{$usuario->email}} </td>
																<td> {{$usuario->direccion}} </td>
																<td> {{$usuario->dni}} </td>
																<td> {{$usuario->cargo}} </td>
																<td>
										@if($usuario->perfil->nombre == 'Administrador')
											<span class="label label-primary"> {{$usuario->perfil->nombre }}</span>
										@else
											<span class="label label-success"> {{$usuario->perfil->nombre }}</span>
										@endif
																</td>
																<td> {{$usuario->escuela->nombre}} </td>
																<td>
																		<a href="{{ route('usuario.edit', $usuario->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a>
																		<a href="{{ route('admin.usuario.destroy', $usuario->id) }}"
																		onclick="return confirm('¿Seguro que deseas eliminarlo?')"  class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
																</td>
														</tr>
														@endforeach

												</tbody>
								</table>
					</div>
			</div>
	</div>
</div>
        {!! $usuarios->render() !!}

@endsection
