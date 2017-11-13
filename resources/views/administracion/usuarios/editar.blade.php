@extends('administracion.template.main')

@section('title','Editar Usuario')

@section('contenido')


	<div class="container">
			<div class="row">
					<div class="col-md-8 col-md-offset-2">
							<div class="panel panel-primary">
									<div class="panel-heading">Editar Usuario</div>

									<div class="panel-body">

									{!! Form::open(['route' => ['usuario.update', $usuario->id] , 'method' => 'PUT']) !!}

										<div class="form-group">
											{!! Form::label('nombreUsuario','Usuario') !!}
											{!! Form::text('nombreUsuario', $usuario->nombreUsuario, ['class' => 'form-control' , 'placeholder' => 'usuarioEjemplo', 'required']) !!}
										</div>

										<div class="form-group">
											{!! Form::label('nombre','Nombre') !!}
											{!! Form::text('nombre', $usuario->nombre, ['class' => 'form-control' , 'placeholder' => 'Nombre Completo', 'required', 'pattern'=>'[a-zA-ZñÑáéíóúÁÉÍÓÚ.,\s]{3,100}', 'title'=>'Solamente Letras - Minimo 3 letras - Maximo 100 Letras']) !!}
										</div>

										<div class="form-group">
											{!! Form::label('direccion','Direccion') !!}
											{!! Form::text('direccion', $usuario->direccion, ['class' => 'form-control' , 'placeholder' => 'Ej. Tafi del Valle', 'required', 'pattern'=>'[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ.,\s]{3,100}', 'title'=>'Solamente Letras - Minimo 3 caraceteres alfanumericos - Maximo 100']) !!}
										</div>

										<div class="form-group">
											{!! Form::label('dni','DNI') !!}
											{!! Form::number('dni', $usuario->dni, ['class' => 'form-control' , 'placeholder' => '33555789', 'required', 'min'=>'0', 'max'=>'99999999']) !!}
										</div>

										<div class="form-group">
											{!! Form::label('cargo','Cargo') !!}
											@if ($usuario->cargo == "Directora")
												{!! Form::Select('cargo', ['Directora' => 'Directora', 'Docente' => 'Docente'], 'Directora', ['class' => 'form-control']) !!}
											@else
												{!! Form::Select('cargo', ['Directora' => 'Directora', 'Docente' => 'Docente'], 'Docente', ['class' => 'form-control']) !!}
											@endif

										</div>

										<div class="form-group">
											{!! Form::label('perfil_id','Perfil') !!}
											{!! Form::Select('perfil_id', $perfiles, $usuario->perfil_id, ['class' => 'form-control' , 'placeholder'=>'Seleccione un Perfil' , 'required']) !!}
										</div>

										<div class="form-group">
											{!! Form::submit('Registrar',['class' => 'btn btn-primary']) !!}
										</div>

									{!! Form::close() !!}

								</div>
						</div>
				</div>
		</div>
</div>


@endsection
