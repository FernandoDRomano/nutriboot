@extends('administracion.template.main')

@section('title','Editar Escuela')

@section('contenido')

	<div class="container">
			<div class="row">
					<div class="col-md-8 col-md-offset-2">
							<div class="panel panel-primary">
									<div class="panel-heading">Editar Escuela</div>

									<div class="panel-body">

									{!! Form::open(['route' => ['escuela.update', $escuela->id] , 'method' => 'PUT']) !!}

										<div class="form-group">
											{!! Form::label('nombre','Nombre') !!}
											{!! Form::text('nombre', $escuela->nombre, ['class' => 'form-control' , 'placeholder' => 'Escuela 230', 'required', 'pattern'=>'[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ.,-°\s]{3,100}', 'title'=>'Solamente Letras - Minimo 3 - Maximo 100 caraceteres alfanumericos']) !!}
										</div>

										<div class="form-group">
											{!! Form::label('direccion','Direccion') !!}
											{!! Form::text('direccion', $escuela->direccion, ['class' => 'form-control' , 'placeholder' => 'Ej. Tafi del Valle', 'required', 'pattern'=>'[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ.,-°\s]{3,100}', 'title'=>'Solamente Letras - Minimo 3 - Maximo 100 caraceteres alfanumericos']) !!}
										</div>

										<div class="form-group">
											{!! Form::label('telefono','telefono') !!}
											{!! Form::text('telefono', $escuela->telefono, ['class' => 'form-control' , 'placeholder' => '33555789', 'required', 'pattern'=> '[0-9()\s+]{1,20}' , 'title'=>'Formato Ej: +549(381) 155346789  - Se permiten numeros ()+ - Maximo 20 caraceteres']) !!}
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
