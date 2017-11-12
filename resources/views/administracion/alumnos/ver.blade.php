@extends('administracion.template.main')

@section('title', 'Alumno')

@section('contenido')

  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-info">
                  <div class="panel-heading">Alumno</div>
                    <div class="panel-body">
                        <ul class="list-group">
                          <li class="list-group-item"><strong>Nombre: </strong>{{$alumno->nombre}}</li>
                          <li class="list-group-item"><strong>DNI: </strong>{{$alumno->dni}}</li>
                          <li class="list-group-item"><strong>Dirección: </strong>{{$alumno->direccion}}</li>
                          <li class="list-group-item"><strong>Fecha de Nacimiento: </strong>{{$alumno->fechaNacimiento}}</li>
                          <li class="list-group-item"><strong>Tutor: </strong>{{$alumno->nombreTutor}}</li>
                        </ul>
                    </div>
             </div>
         </div>
     </div>


      <div class="row">
        <div class="col-md-12">
          {{-- UTILIZO EL METODO SHOW DEBIDO A QUE PARA EL METODO CREATE NO LE PUEDO PASAR PARAMETROS, DESPUES EN SHOW REDIRECCIONO A LA VISTA crear
          Y POR ULTIMO LLAMO A LA ROUTE STORE --}}
          <a href="{{ route('registro.show' , $alumno->id) }}" class="btn btn-primary" role="button">Nuevo Registro</a><br><br>
          <div class="panel panel-info">
              <div class="panel-heading text-center"><strong>Registro de Evolucion</strong></div>
                  <table class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                  <th>Id</th>
                                  <th>Fecha</th>
                                  <th>Peso</th>
                                  <th>Altura</th>
                                  <th>Imc</th>
                                  <th>Resultado</th>
                                  <th>Opciones</th>
                              </tr>
                          </thead>
                          <tbody>

                              @foreach ($registros as $registro)
                              <tr>
                                  <td> {{$registro->id}} </td>
                                  <td> {{$registro->fecha}} </td>
                                  <td> {{$registro->peso}} </td>
                                  <td> {{$registro->altura}} </td>
                                  <td> {{$registro->imc}} </td>
                                  <td>Resultado</td>
                                  <td>
                                      <a href="{{ route('registro.edit', $registro->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a>
                                      <a href="{{ route('admin.registro.destroy', $registro->id) }}"
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

{{-- {!! $regitros->render() !!} --}}


@endsection
