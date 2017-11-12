@extends('administracion.template.main')

@section('title','Nuevo Alumno')

@section('contenido')

	<div class="container">
			<div class="row">
					<div class="col-md-8 col-md-offset-2">
							<div class="panel panel-primary">
									<div class="panel-heading">Nuevo Alumno</div>

									<div class="panel-body">

										{!! Form::open(['route' => 'alumno.store' , 'method' => 'POST']) !!}

										<div class="form-group">
											{!! Form::label('nombre','Nombre') !!}
											{!! Form::text('nombre', null, ['class' => 'form-control' , 'placeholder' => 'Nombre Completo', 'required', 'pattern'=>'[a-zA-ZñÑáéíóúÁÉÍÓÚ.,\s]{3,80}', 'title'=>'Solamente Letras - Minimo 3 letras - Maximo 80']) !!}
										</div>

                    <div class="form-group">
                      {!! Form::label('dni','DNI') !!}
                      {!! Form::number('dni', null, ['class' => 'form-control' , 'placeholder' => '33555789', 'required', 'min'=>'0', 'max'=>'99999999']) !!}
                    </div>

										<div class="form-group">
											{!! Form::label('direccion','Dirección') !!}
											{!! Form::text('direccion', null, ['class' => 'form-control' , 'placeholder' => 'Ej. Tafi del Valle', 'required', 'pattern'=>'[a-zA-ZñÑáéíóúÁÉÍÓÚ.,-°\s]{3,100}', 'title'=>'Solamente Letras - Minimo 3 letras - Maximo 100 Letras']) !!}
										</div>

										<div class="form-group">
											{!! Form::label('fechaNacimiento','Fecha de Nacimiento') !!}
                      {!! Form::date('fechaNacimiento', \Carbon\Carbon::now()) !!}
										</div>

										<div class="form-group">
											{!! Form::label('nombreTutor','Tutor') !!}
                      {!! Form::text('nombreTutor', null, ['class' => 'form-control' , 'placeholder' => 'Nombre Tutor...', 'required', 'pattern'=>'[a-zA-ZñÑáéíóúÁÉÍÓÚ.,\s]{3,80}', 'title'=>'Solamente Letras - Minimo 3 letras - Maximo 80 Letras']) !!}
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
