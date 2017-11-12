@extends('administracion.template.main')

@section('title','Editar Alumno')

@section('contenido')


	<div class="container">
			<div class="row">
					<div class="col-md-8 col-md-offset-2">
							<div class="panel panel-default">
									<div class="panel-heading">Editar Alumno</div>

									<div class="panel-body">

									{!! Form::open(['route' => ['alumno.update', $alumno->id] , 'method' => 'PUT']) !!}

										<div class="form-group">
											{!! Form::label('nombre','Nombre') !!}
											{!! Form::text('nombre', $alumno->nombre, ['class' => 'form-control' , 'placeholder' => 'Nombre Completo', 'required', 'pattern'=>'[a-zA-ZñÑáéíóúÁÉÍÓÚ.,\s]{3,80}', 'title'=>'Solamente Letras - Minimo 3 letras - Maximo 80 Letras']) !!}
										</div>

                    <div class="form-group">
											{!! Form::label('dni','DNI') !!}
											{!! Form::number('dni', $alumno->dni, ['class' => 'form-control' , 'placeholder' => '33555789', 'required', 'min'=>'0', 'max'=>'99999999']) !!}
										</div>

										<div class="form-group">
											{!! Form::label('direccion','Dirección') !!}
											{!! Form::text('direccion', $alumno->direccion, ['class' => 'form-control' , 'placeholder' => 'Ej. Tafi del Valle', 'required', 'pattern'=>'[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ.-°\s]{3,100}', 'title'=>'Solamente Letras - Minimo 3 caraceteres alfanumericos - Maximo 100 caracteres']) !!}
										</div>

                    <div class="form-group">
											{!! Form::label('fechaNacimiento','Fecha de Nacimiento') !!}
                      <input type="date" name="fechaNacimiento" step="1" min="1900-01-01" max="2200-12-31" value={{$alumno->fechaNacimiento}}>
                      {{-- {!! Form::date('fechaNacimiento', \Carbon\Carbon::now()) , $alumno->fechaNacimento!!} --}}

										</div>

										<div class="form-group">
											{!! Form::label('nombreTutor','Tutor') !!}
                      {!! Form::text('nombreTutor', $alumno->nombreTutor, ['class' => 'form-control' , 'placeholder' => 'Nombre Tutor...', 'required', 'pattern'=>'[a-zA-ZñÑáéíóúÁÉÍÓÚ.,\s]{3,80}', 'title'=>'Solamente Letras - Minimo 3 Letras - Maximo 80 Letras']) !!}
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
