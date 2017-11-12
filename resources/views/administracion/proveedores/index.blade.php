@extends('administracion.template.main')

@section('title', 'Gestion de Proveedores')

@section('contenido')

<div class="container col-md-12">

  <div class="row">
          <div class="col-md-12">
              <div class="panel panel-danger">
                  <div class="panel-heading text-center"><h4><strong>Escuela: </strong> {{$escuela->nombre}}</h4></div>
             </div>
         </div>
 </div>


  <div class="row">
        <div class="col-md-12">
            <a href="{{ route('proveedor.create') }}" class="btn btn-primary" role="button">Nuevo Proveedor</a><br><br>
            {{-- Buscador de Proveedores --}}
            {{Form::open(['route'=>'proveedor.index', 'method'=>'GET', 'class'=>'navbar-form pull-right' ])}}
                <div class="input-group">
                  {{Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Buscar Proveedor..', 'aria-describedby' =>'search'])}}
                  <span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
                </div>
            {{Form::close()}}
            {{-- Fin del Buscador --}}
      </div>
</div>

<div class="row">
    <div class="col-md-12">
      <div class="panel panel-info">
          <div class="panel-heading text-center"><strong>Listado de Proveedores</strong></div>
                <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($proveedores as $proveedor)
                            <tr>
                                <td> {{$proveedor->id}} </td>
                                <td> {{$proveedor->nombre}} </td>
                                <td>
                                    <a href="{{ route('proveedor.edit', $proveedor->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a>
                                    <a href="{{ route('admin.proveedor.destroy', $proveedor->id) }}"
                                    onclick="return confirm('¿Seguro que deseas eliminarlo?')"  class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                </table>
              </div>
					</div>
			</div>
</div>

        {!! $proveedores->render() !!}
@endsection
