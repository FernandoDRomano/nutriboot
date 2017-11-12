@extends('administracion.template.main')

@section('title','Gestion de Estaciones')

@section('contenido')

	<div class="row">
        <div class="form-group">
            <a href="{{ route('estacion.create') }}" class="btn btn-primary" role="button">Nueva Estación</a><br><br>
						{{-- Buscador de Estaciones --}}
						{{Form::open(['route'=>'estacion.index', 'method'=>'GET', 'class'=>'navbar-form pull-right' ])}}
								<div class="input-group">
									{{Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Buscar Estación..', 'aria-describedby' =>'search'])}}
									<span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
								</div>
						{{Form::close()}}
						{{-- Fin del Buscador --}}
				</div>
	</div>

	<div class="row">
			<div class="col-md-12">
				<div class="panel panel-info">
						<div class="panel-heading text-center"><strong>Listado de Estaciones</strong></div>
								<table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                            	<th>Id</th>
                                <th>Nombre</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($estaciones as $estacion)
                            <tr>
                            	  <td> {{$estacion->id}} </td>
                                <td> {{$estacion->nombre}} </td>
                                <td>
                                    <a href="{{ route('estacion.edit', $estacion->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a>
                                    <a href="{{ route('admin.estacion.destroy', $estacion->id) }}"
                                    onclick="return confirm('¿Seguro que deseas eliminarlo?')"  class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                </table>
							</div>
					</div>
			</div>


        {!! $estaciones->render() !!}

@endsection
