@extends('administracion.template.main')

@section('title','Nuevo Usuario')

@section('contenido')

	<div class="container">
			<div class="row">
					<div class="col-md-8 col-md-offset-2">
							<div class="panel panel-primary">
									<div class="panel-heading">Nuevo Usuario</div>

									<div class="panel-body">

										{!! Form::open(['route' => 'usuario.store' , 'method' => 'POST']) !!}

										<div class="form-group">
											{!! Form::label('nombreUsuario','Usuario') !!}
											{!! Form::text('nombreUsuario', null, ['class' => 'form-control' , 'placeholder' => 'usuarioEjemplo', 'required']) !!}
										</div>

										<div class="form-group">
											{!! Form::label('password','Contraseña') !!}
											{!! Form::password('password', ['class' => 'form-control' , 'placeholder' => '****************', 'required', 'minlength'=>'6', 'title'=>'Minimo 6 Caracteres Alfanumericos']) !!}
										</div>

										<div class="form-group">
											{!! Form::label('nombre','Nombre') !!}
											{!! Form::text('nombre', null, ['class' => 'form-control' , 'placeholder' => 'Nombre Completo', 'required', 'pattern'=>'[a-zA-ZñÑáéíóúÁÉÍÓÚ.,\s]{3,100}', 'title'=>'Solamente Letras - Minimo 3 letras - Maximo 100']) !!}
										</div>

										<div class="form-group">
											{!! Form::label('email','Email') !!}
											{!! Form::email('email', null, ['class' => 'form-control' , 'placeholder' => 'usuario@algo.com', 'required']) !!}
										</div>

										<div class="form-group">
											{!! Form::label('direccion','Direccion') !!}
											{!! Form::text('direccion', null, ['class' => 'form-control' , 'placeholder' => 'Ej. Tafi del Valle', 'required', 'pattern'=>'[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ.,\s]{3,100}', 'title'=>'Solamente Letras - Minimo 3 caraceteres alfanumericos - Maximo 100']) !!}
										</div>

										<div class="form-group">
											{!! Form::label('dni','DNI') !!}
											{!! Form::number('dni', null, ['class' => 'form-control' , 'placeholder' => '33555789', 'required', 'min'=>'0', 'max'=>'99999999']) !!}
										</div>

										<div class="form-group">
											{!! Form::label('cargo','Cargo') !!}
											{!! Form::Select('cargo', ['Directora' => 'Directora', 'Docente' => 'Docente'], null, ['class' => 'form-control', 'required']) !!}
										</div>

										<div class="form-group">
											{!! Form::label('perfil_id','Perfil') !!}
											{!! Form::Select('perfil_id', $perfiles, null, ['class' => 'form-control' , 'placeholder'=>'Seleccione un Perfil' , 'required']) !!}
										</div>

										<div class="form-group">
											{!! Form::label('escuela_id','Escuela') !!}
											{!! Form::Select('escuela_id', $escuelas, null, ['class' => 'form-control' , 'placeholder'=>'Seleccione una Escuela' , 'required']) !!}
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
