@extends('layouts.plantilla')
@section('titulo')
    <h3>Cátedras</h3>
@endsection
@section('estilos')
    <link rel="stylesheet" href="/calendario/css/bootstrap-datepicker.standalone.css">
    <link rel="stylesheet" href="/select2/bootstrap-select.min.css"> 
@endsection
@section('contenido')
    <div class="x_title">
        <h2>Mantenimiento de<b> Cátedras</b></h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Settings 1</a>
                    <a class="dropdown-item" href="#">Settings 2</a>
                </div>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
        </ul>
        <div class="clearfix"></div>
    </div>

    <!-- Contenido -->

    <div class="x_content">
        <table class="table table-striped jambo_table bulk_action col-md-10">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center" scope="col">Código</th>
                    <th class="text-center" scope="col">Docente</th>
                    <th class="text-center" scope="col">Curso</th>
                    <th class="text-center" scope="col">Grado</th>
                    <th class="text-center" scope="col">Seccion</th>
                </tr>
            </thead>
            <tbody>
               
                <tr>
                    @foreach($catedras as $itemcatedra)
                    <tr>
                        <td class="text-center">{{$itemcatedra->cursos->CODIGO}}</th>
                        <td class="text-center">{{$itemcatedra->docente->APENOM}}</th>
                        <td class="text-center">{{$itemcatedra->cursos->CURSO}}</td>
                        <td class="text-center">{{$itemcatedra->cursos->grado->GRADO}}</th>
                        <td class="text-center">{{$itemcatedra->cursos->seccion->SECCION}}</th>
                    </tr>
                    @endforeach
                </tr>
                 
            </tbody>
        </table>
    </div>
    
@endsection