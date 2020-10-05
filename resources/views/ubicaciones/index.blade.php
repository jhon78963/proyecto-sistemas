@extends('layouts.plantilla')
@section('buscador')
    <form class="form-inline my-2 my-lg-0">
        <input name="buscarpor" class="form-control" type="search"  placeholder="Buscar por distrito" value="{{$buscarpor}}">
        <span class="input-group-btn">
            <button class="btn btn-default" type="submit">Buscar</button>
        </span>
    </form>
@endsection
@section('titulo')
    <h3>Ubicaciones Geográficas</h3>
@endsection
@section('contenido')
    <div class="x_title">
        <h2>Mantenimiento de<b> Ubicación Geográfica</b></h2>
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
        <table class="table table-striped jambo_table bulk_action">
            <thead class="thead-dark">
            <tr>
                <th class="text-center" scope="col">ID</th>
                <th class="text-center" scope="col">Distrito</th>
                <th class="text-center" scope="col">Provincia</th>
                <th class="text-center" scope="col">Departamento</th>
            </tr>
            </thead>
            <tbody>
                @foreach($distrito as $itemdistrito)
                    <tr>
                        <td class="text-center">{{$itemdistrito->IDDISTRITO}}</th>
                        <td class="text-center">{{$itemdistrito->DISTRITO}}</th>
                        <td class="text-center">{{$itemdistrito->provincia->PROVINCIA}}</th>
                        <td class="text-center">{{$itemdistrito->departamento->DEPARTAMENTO}}</th>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-center">{{$distrito->links()}}</div>
    </div>

@endsection
