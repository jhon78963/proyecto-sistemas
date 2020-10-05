@extends('layouts.plantilla')
@section('buscador')
    <form class="form-inline my-2 my-lg-0">
        <input name="buscarpor" class="form-control" type="search"  placeholder="Buscar por nombre" value="{{$buscarpor}}">
        <span class="input-group-btn">
            <button class="btn btn-default" type="submit">Buscar</button>
        </span>
    </form>
@endsection
@section('titulo')
    <h3>Docentes</h3>
@endsection
@section('contenido')
    <div class="x_title">
        <h2>Mantenimiento de<b> Docentes</b></h2>
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
        <a href="{{route('docente.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Nuevo Registro </a>
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
                <th class="text-center" scope="col">ID</th>
                <th class="text-center" scope="col">Nombres y Apellidos</th>
                <th class="text-center" scope="col">Telefono</th>
                <th class="text-center" scope="col">Fecha de Ingreso</th>
                <th class="text-center" scope="col">Opciones</th>

            </tr>
            </thead>
            <tbody>
                @if ($docentes->count())
                    @foreach($docentes as $itemdocente)
                        <tr>
                            <td class="text-center">{{$itemdocente->IDDOCENTE}}</th>
                            <td class="text-center">{{$itemdocente->APENOM}}</th>
                            <td class="text-center">{{$itemdocente->TELEFONO}}</th>
                            <td class="text-center">{{$itemdocente->FECINGRESO}}</th>
                            <td class="text-center">
                                <a href="{{route('docente.edit',$itemdocente->IDDOCENTE)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Editar</a>
                                <a href="{{route('docente.confirmar',$itemdocente->IDDOCENTE)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Eliminar</a>
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
    </div>
    <div class="text-center">{{$docentes->links()}}</div>
@endsection
