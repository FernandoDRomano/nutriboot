@extends('administracion.template.main')

@section('title','Editar Insumo')

@section('contenido')


	<div class="container">
			<div class="row">
					<div class="col-md-8 col-md-offset-2">
							<div class="panel panel-default">
									<div class="panel-heading">Editar Insumo</div>

									<div class="panel-body">

									{!! Form::open(['route' => ['insumo.update', $insumo->id] , 'method' => 'PUT']) !!}

										<div class="form-group">
											{!! Form::label('nombre','Nombre') !!}
											{!! Form::text('nombre', $insumo->nombre, ['class' => 'form-control' , 'placeholder' => 'Nombre Completo', 'required', 'pattern'=>'[a-zA-ZñÑáéíóúÁÉÍÓÚ.,\s]{3,100}', 'title'=>'Solamente Letras - Minimo 3 letras - Maximo 100 Letras]) !!}
										</div>

                    <div class="form-group">
											{!! Form::label('descripcion','Descripcion') !!}
											{!! Form::text('descripcion', $insumo->descripcion, ['class' => 'form-control' , 'placeholder' => 'detalles importante', 'required']) !!}
										</div>

                    <div class="form-group">
											{!! Form::label('cantidad','Cantidad') !!}
											{!! Form::number('cantidad', $insumo->cantidad, ['class' => 'form-control' , 'placeholder' => '5 Kg...', 'required', 'min'=>'0', 'max'=>'9999']) !!}
										</div>

                    <div class="form-group">
											{!! Form::label('fechaVencimiento','Fecha de Vencimiento') !!}
                      <input type="date" name="fechaVencimiento" step="1" min="1900-01-01" max="2200-12-31" value={{$insumo->fechaVencimiento}}>
										</div>

                    <div class="form-group">
											{!! Form::label('calorias','Calorias') !!}
											{!! Form::number('calorias', $insumo->calorias, ['class' => 'form-control' , 'placeholder' => '500 KCal ...', 'required']) !!}
										</div>

										<div class="form-group">
											{!! Form::label('categoria_id','Categoria') !!}
											{!! Form::Select('categoria_id', $categorias, $insumo->categoria_id, ['class' => 'form-control' , 'placeholder'=>'Seleccione una Categoria' , 'required']) !!}
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
