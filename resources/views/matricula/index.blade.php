@extends('layouts.plantilla')
@section('titulo')
    <h3>Matriculas</h3>
@endsection
@section('contenido')
    <div class="x_title">
    <h2>Mantenimiento de<b> Matriculas</b></h2>
    <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Settings 1</a>
            <a class="dropdown-item" href="#">Settings 2</a>
        </div>
    </li>
      <li><a class="close-link"><i class="fa fa-close"></i></a>
      </li>
    </ul>
    <div class="clearfix"></div>
  </div>

  <!-- Contenido -->
    <div class="x_content">
        <div class="col">
            <a href="{{route('matricula.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Nuevo Registro </a>
            @if(session('datos'))
                <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                    {{ session('datos') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <table class="table table-striped jambo_table bulk_action">
                <thead class="thead-dark">
                    <th>ID MATRICULA</th>
                    <th>NOMBRE Y APELLIDOS</th>
                    <th>ESCALA</th>
                    <th>AÑO DE INGRESO</th>
                    <th>OPCIONES</th>
                </thead>
                <tbody>
                    @if ($matriculas->count())
                        @foreach ($matriculas as $matricula)
                            <tr>
                                <td>{{$matricula->IDMATRICULA}}</td>
                                <td>{{$matricula->NOMBRECOMPLETO}}</td>
                                <td>{{$matricula->ESCALA}}</td>
                                <td>{{$matricula->AÑOINGRESO}}</td>
                                <td>
                                    <div class="btn-group" style="white-space: nowrap; width: 1px;" role="group">
                                        <a class="btn btn-info" href="{{action('MatriculaController@edit',$matricula->IDMATRICULA)}}">Editar</a>
                                        <!-- Button trigger modal -->
                                        <a class="btn btn-danger text-white" data-toggle="modal" data-target="#exampleModal{{$matricula->IDMATRICULA}}">Eliminar</a>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$matricula->IDMATRICULA}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Eliminar Matricula</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>¿Realmente quieres eliminar este registro?</p>
                                                <div class="alert alert-danger" role="alert">
                                                    Este cambio es irreversible
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <form class="btn btn-danger" action="{{action('MatriculaController@destroy',$matricula->IDMATRICULA)}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input class="p-0 border-0 text-white" style="background: none;" type="submit" value="Eliminar">
                                            </form>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">¡No hay ningun registro de matriculas! <a href="{{route('matricula.create')}}">Registra uno ahora :D</a></td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
