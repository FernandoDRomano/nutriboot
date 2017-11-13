@extends('administracion.template.main')

@section('title','Editar Proveedor')

@section('contenido')

	<div class="container">
			<div class="row">
					<div class="col-md-8 col-md-offset-2">
							<div class="panel panel-primary">
									<div class="panel-heading">Nuevo Proveedor</div>

									<div class="panel-body">

									{!! Form::open(['route' => ['proveedor.update', $proveedor->id] , 'method' => 'PUT']) !!}

										<div class="form-group">
											{!! Form::label('nombre','Nombre') !!}
											{!! Form::text('nombre', $proveedor->nombre, ['class' => 'form-control' , 'placeholder' => 'Doña Pepa', 'required', 'pattern'=>'[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ.,-°\s]{3,100}', 'title'=>'Minimo 3 caraceteres alfanumericos - Maximo 100']) !!}
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
