@extends('administracion.template.main')

@section('title','Nuevo Insumo')

@section('contenido')

	<div class="container">
			<div class="row">
					<div class="col-md-8 col-md-offset-2">
							<div class="panel panel-primary">
									<div class="panel-heading">Nuevo Insumo</div>

									<div class="panel-body">

										{!! Form::open(['route' => 'insumo.store' , 'method' => 'POST']) !!}

										<div class="form-group">
											{!! Form::label('nombre','Nombre') !!}
											{!! Form::text('nombre', null, ['class' => 'form-control' , 'placeholder' => 'Arroz...', 'required', 'pattern'=>'[a-zA-ZñÑáéíóúÁÉÍÓÚ.,-\s]{3,100}', 'title'=>'Solamente Letras - Minimo 3 letras - Maximo 100 Letras']) !!}
										</div>

										<div class="form-group">
											{!! Form::label('descripcion','Descripcion') !!}
											{!! Form::text('descripcion', null, ['class' => 'form-control' , 'placeholder' => 'detalles importante', 'required']) !!}
										</div>

										<div class="form-group">
											{!! Form::label('cantidad','Cantidad') !!}
											{!! Form::number('cantidad', null, ['class' => 'form-control' , 'placeholder' => '5 Kg...', 'required' , 'min'=>'0', 'max'=>'9999']) !!}
										</div>

                    <div class="form-group">
											{!! Form::label('fechaVencimiento','Fecha de Vencimiento') !!}
                      {!! Form::date('fechaVencimiento', \Carbon\Carbon::now()) !!}
										</div>

                    <div class="form-group">
											{!! Form::label('calorias','Calorias') !!}
											{!! Form::number('calorias', null, ['class' => 'form-control' , 'placeholder' => '500 KCal ...', 'required']) !!}
										</div>

										<div class="form-group">
											{!! Form::label('categoria_id','Categoria') !!}
											{!! Form::Select('categoria_id', $categorias, null, ['class' => 'form-control' , 'placeholder'=>'Seleccione una Categoria' , 'required']) !!}
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
