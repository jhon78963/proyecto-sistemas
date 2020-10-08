@extends('layouts.plantilla')

@section('buscador')
    <form class="form-inline my-2 my-lg-0">
        <input name="buscarpor" class="form-control" type="search"  placeholder="Buscar por curso" value="{{$buscarpor}}">
        <span class="input-group-btn">
            <button class="btn btn-default" type="submit">Buscar</button>
        </span>
    </form>
@endsection

@section('titulo')
    <h3>Cursos</h3>
@endsection

@section('contenido')
    <div class="x_title">
        <h2>Mantenimiento de<b> Cursos</b></h2>
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

        <a href="{{route('curso.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Nuevo Registro </a>
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
            <tr>
                <th class="text-center" scope="col">Código</th>
                <th class="text-center" scope="col">Curso</th>
                <th class="text-center" scope="col">Nivel</th>
                <th class="text-center" scope="col">Grado</th>
                <th class="text-center" scope="col">Seccion</th>
                <th class="text-center" scope="col">Opciones</th>

            </tr>
            </thead>
            <tbody>
                @if ($cursos->count())
                    @foreach($cursos as $itemcurso)
                        <tr>
                            <td class="text-center">{{$itemcurso->CODIGO}}</th>
                            <td class="text-center">{{$itemcurso->CURSO}}</th>
                            <td class="text-center">{{$itemcurso->NIVEL->NIVEL}}</th>
                            <td class="text-center">{{$itemcurso->GRADO->GRADO}}</th>
                                <td class="text-center">{{$itemcurso->SECCION->SECCION}}</th>
                            <td class="text-center">
                                <a href="{{route('curso.edit',$itemcurso->IDCURSO)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Editar</a>
                                <a href="{{route('curso.confirmar',$itemcurso->IDCURSO)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">¡No hay registros!</td>
                    </tr>
                @endif
            </tbody>
        </table>
        <div class="text-center">{{$cursos->links()}}</div>
  </div>
@endsection
