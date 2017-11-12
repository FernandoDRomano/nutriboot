@extends('administracion.template.main')

@section('title','Gestion de Escuelas')

@section('contenido')

	<div class="row">
        <div class="form-group">
            <a href="{{ route('escuela.create') }}" class="btn btn-primary" role="button">Nueva Escuela</a><br><br>
						{{-- Buscador de Escuelas --}}
						{{Form::open(['route'=>'escuela.index', 'method'=>'GET', 'class'=>'navbar-form pull-right' ])}}
								<div class="input-group">
									{{Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Buscar Escuelas..', 'aria-describedby' =>'search'])}}
									<span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
								</div>
						{{Form::close()}}
						{{-- Fin del Buscador --}}
				</div>
	</div>

	<div class="row">
			<div class="col-md-12">
				<div class="panel panel-info">
						<div class="panel-heading text-center"><strong>Listado de Escuelas</strong></div>
								<table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                            	<th>Id</th>
                                <th>Nombre</th>
                                <th>Dirección</th>
                                <th>Telefono</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($escuelas as $escuela)
                            <tr>
                            	<td> {{$escuela->id}} </td>
                                <td> {{$escuela->nombre}} </td>
                                <td> {{$escuela->direccion}} </td>
                                <td> {{$escuela->telefono}} </td>
                                <td>
                                    <a href="{{ route('escuela.edit', $escuela->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a>
                                    <a href="{{ route('admin.escuela.destroy', $escuela->id) }}"
                                    onclick="return confirm('¿Seguro que deseas eliminarlo?')"  class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                </table>
							</div>
					</div>
			</div>


        {!! $escuelas->render() !!}

@endsection
