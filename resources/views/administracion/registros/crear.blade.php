@extends('administracion.template.main')

@section('title','Nuevo Registro')

@section('contenido')

	<div class="container">
    <div class="row">
            <div class="col-md-12">
                <div class="panel panel-danger">
                    <div class="panel-heading text-center"><h4><strong>Alumno: </strong> {{$alumno->nombre}}</h4></div>
               </div>
           </div>
    </div>

			<div class="row">
					<div class="col-md-8 col-md-offset-2">
							<div class="panel panel-primary">
									<div class="panel-heading">Nuevo Registro</div>

									<div class="panel-body">

										{!! Form::open(['route' => 'registro.store' , 'method' => 'POST']) !!}

                    <div class="form-group">
                      {!! Form::label('alumno_id','Id Alumno') !!}
                      {!! Form::text('alumno_id', $alumno->id, ['class' => 'form-control' , 'placeholder' => '20', 'required', 'readonly'=>'readonly']) !!}
                    </div>

                    <div class="form-group">
                      {!! Form::label('alumno_nombre','Alumno') !!}
                      {!! Form::text('alumno_nombre', $alumno->nombre, ['class' => 'form-control' , 'placeholder' => '20', 'required', 'readonly'=>'readonly']) !!}
                    </div>

                    <div class="form-group">
											{!! Form::label('fecha','Fecha') !!}
                      {!! Form::date('fecha', \Carbon\Carbon::now()) !!}
										</div>

                    <div class="form-group">
                      {!! Form::label('peso','Peso (Kg)') !!}
                      {!! Form::number('peso', null, ['class' => 'form-control' , 'placeholder' => '20', 'required', 'min'=>'0', 'max'=>'999']) !!}
                    </div>

										<div class="form-group">
											{!! Form::label('altura','Altura (m)') !!}
											{!! Form::number('altura', null, ['class' => 'form-control' , 'placeholder' => '1,2', 'required', 'min'=>'0', 'max'=>'999']) !!}
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
