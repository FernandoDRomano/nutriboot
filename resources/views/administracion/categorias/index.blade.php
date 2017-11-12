@extends('administracion.template.main')

@section('title','Gestion de Categorias')

@section('contenido')

	<div class="row">
        <div class="form-group">
            <a href="{{ route('categoria.create') }}" class="btn btn-primary" role="button">Nueva Categoria</a><br><br>
						{{-- Buscador de Categorias --}}
						{{Form::open(['route'=>'categoria.index', 'method'=>'GET', 'class'=>'navbar-form pull-right' ])}}
								<div class="input-group">
									{{Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Buscar Categoria..', 'aria-describedby' =>'search'])}}
									<span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
								</div>
						{{Form::close()}}
						{{-- Fin del Buscador --}}
				</div>
	</div>

	<div class="row">
			<div class="col-md-12">
				<div class="panel panel-info">
						<div class="panel-heading text-center"><strong>Listado de Categorias</strong></div>
								<table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                            	<th>Id</th>
                                <th>Nombre</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($categorias as $categoria)
                            <tr>
                            	  <td> {{$categoria->id}} </td>
                                <td> {{$categoria->nombre}} </td>
                                <td>
                                    <a href="{{ route('categoria.edit', $categoria->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a>
                                    <a href="{{ route('admin.categoria.destroy', $categoria->id) }}"
                                    onclick="return confirm('¿Seguro que deseas eliminarlo?')"  class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                </table>
							</div>
					</div>
			</div>


        {!! $categorias->render() !!}

@endsection
