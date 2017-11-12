@extends('administracion.template.main')

@section('title','Nueva Categoria')

@section('contenido')
	<div class="container">
			<div class="row">
					<div class="col-md-8 col-md-offset-2">
							<div class="panel panel-primary">
									<div class="panel-heading">Nueva Categoria</div>

									<div class="panel-body">

									{!! Form::open(['route' => 'categoria.store' , 'method' => 'POST']) !!}

										<div class="form-group">
											{!! Form::label('nombre','Nombre') !!}
											{!! Form::text('nombre', null, ['class' => 'form-control' , 'placeholder' => 'Carne ...', 'required', 'pattern'=>'[a-zA-ZñÑáéíóúÁÉÍÓÚ.,-°\s]{3,100}', 'title'=>'Solamente Letras - Minimo 3 letras - Maximo 100 Letras']) !!}
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
