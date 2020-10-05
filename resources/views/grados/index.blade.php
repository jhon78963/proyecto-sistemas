@extends('layouts.plantilla')

@section('buscador')
    <form class="form-inline my-2 my-lg-0">
        <input name="buscarpor" class="form-control" type="search"  placeholder="Buscar por sección" value="{{$buscarpor}}">
        <span class="input-group-btn">
            <button class="btn btn-default" type="submit">Buscar</button>
        </span>
    </form>
@endsection

@section('titulo')
    <h3>Grados de Estudios</h3>
@endsection

@section('contenido')
    <div class="x_title">
        <h2>Mantenimiento de<b> Grados y Secciones</b></h2>
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
                <th class="text-center  col-md-6 col-sm-6" scope="col">Grado</th>
                <th class="text-center  col-md-6 col-sm-6" scope="col">Sección</th>
            </tr>
            </thead>
            <tbody>
                @foreach($secciones as $itemseccion)
                    @if ($grado->IDGRADO == $itemseccion->IDGRADO)
                        <tr>
                            <td class="col-md-6 col-sm-6">
                                <div class="text-center">{{$grado->GRADO}}</div>
                            </td>
                            <td class="col-md-6 col-sm-6">
                                <div class="text-center">{{$itemseccion->SECCION}}</div>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
  </div>
@endsection

@section('contenidoCurso')
    <div class="x_title">
        <h2>Mantenimiento de<b> Cursos por Grado</b></h2>
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
                    <th class="text-center  col-md-6 col-sm-6" scope="col">Grado</th>
                    <th class="text-center  col-md-6 col-sm-6" scope="col">Curso</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cursos as $itemcurso)
                @if ($grado->IDGRADO == $itemcurso->IDGRADO)
                    <tr>
                        <td class="col-md-6 col-sm-6">
                            <div class="text-center">{{$grado->GRADO}}</div>
                        </td>
                        <td class="col-md-6 col-sm-6">
                            <div class="text-center">{{$itemcurso->CURSO}}</div>
                        </td>
                    </tr>
                @endif
                @endforeach
            </tbody>
        </table>
  </div>
@endsection
