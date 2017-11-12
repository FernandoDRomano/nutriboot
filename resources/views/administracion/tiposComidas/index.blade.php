@extends('administracion.template.main')

@section('title','Gestion de Tipos de Comidas')

@section('contenido')

	<div class="row">
        <div class="form-group">
            <a href="{{ route('tipoComida.create') }}" class="btn btn-primary" role="button">Nuevo Tipo de Comida</a><br><br>
						{{-- Buscador de Tipos de Comida --}}
						{{Form::open(['route'=>'tipoComida.index', 'method'=>'GET', 'class'=>'navbar-form pull-right' ])}}
								<div class="input-group">
									{{Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Buscar Tipo de Comida..', 'aria-describedby' =>'search'])}}
									<span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
								</div>
						{{Form::close()}}
						{{-- Fin del Buscador --}}
				</div>
	</div>

	<div class="row">
			<div class="col-md-12">
				<div class="panel panel-info">
						<div class="panel-heading text-center"><strong>Listado de Tipos de Comidas</strong></div>
								<table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                            	<th>Id</th>
                                <th>Nombre</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($tiposComidas as $tipo)
                            <tr>
                            	  <td> {{$tipo->id}} </td>
                                <td> {{$tipo->nombre}} </td>
                                <td>
                                    <a href="{{ route('tipoComida.edit', $tipo->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a>
                                    <a href="{{ route('admin.tipoComida.destroy', $tipo->id) }}"
                                    onclick="return confirm('¿Seguro que deseas eliminarlo?')"  class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                </table>
							</div>
					</div>
			</div>


        {!! $tiposComidas->render() !!}

@endsection
