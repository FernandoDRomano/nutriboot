@extends('administracion.template.main')

@section('title','Gestion de Insumos')

@section('contenido')

	<div class="row">
      <div class="form-group">
            <a href="{{ route('insumo.create') }}" class="btn btn-primary" role="button">Nuevo Insumo</a><br><br>
						{{-- Buscador de Insumos --}}
						{{Form::open(['route'=>'insumo.index', 'method'=>'GET', 'class'=>'navbar-form pull-right' ])}}
								<div class="input-group">
									{{Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Buscar Insumos..', 'aria-describedby' =>'search'])}}
									<span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
								</div>
						{{Form::close()}}
						{{-- Fin del Buscador --}}
			</div>
</div>

<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
					<div class="panel-heading text-center"><strong>Listado de Insumos</strong></div>
							<table class="table table-bordered table-striped">
											<thead>
													<tr>
															<th>Id</th>
															<th>Nombre</th>
															<th>Descripcion</th>
															<th>Cantidad</th>
															<th>Fecha Vencimiento</th>
															<th>Calorias</th>
															<th>Categoria</th>
															<th>Opciones</th>
													</tr>
											</thead>
											<tbody>

													@foreach ($insumos as $insumo)
													<tr>
															<td> {{$insumo->id}} </td>
															<td> {{$insumo->nombre}} </td>
															<td> {{$insumo->descripcion}} </td>
															<td> {{$insumo->cantidad}} </td>
															<td> {{$insumo->fechaVencimiento}} </td>
															<td> {{$insumo->calorias}} </td>
															<td> {{$insumo->categoria->nombre}} </td>
															<td>
																	<a href="{{ route('insumo.edit', $insumo->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a>
																	<a href="{{ route('admin.insumo.destroy', $insumo->id) }}"
																	onclick="return confirm('¿Seguro que deseas eliminarlo?')"  class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
															</td>
													</tr>
													@endforeach

											</tbody>
							</table>
				</div>
		</div>
</div>

{!! $insumos->render() !!}

@endsection
