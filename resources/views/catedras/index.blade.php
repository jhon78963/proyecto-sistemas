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
        <div class="row">
            <label for="" class="col-md-1" style="line-height:40px;" align="center">Docente</label>

            <select class="form-control select2 select2-hidden-accessible selectpicker col-md-2" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" data-live-search="true" name="IDDOCENTE" id="IDDOCENTE">
                <option value="0">Seleccione docente</option>
                @foreach ($docente as $itemdocente)
                    <option value="{{$itemdocente->IDDOCENTE}}">{{$itemdocente->IDDOCENTE}}</option>
                @endforeach
            </select>

            <div class="col-md-7">
                <input type="text" class="form-control" id="APENOM" name="APENOM" disabled>
            </div>
            <label for="" class="col-md-1" style="line-height:40px;" align="center">Año escolar</label>
            <input type="number" class="form-control col-md-1" id="AÑOESCOLAR" name="AÑOESCOLAR">
        </div>
        <div class="row">
            <table class="table table-striped jambo_table bulk_action col-md-10">
                <thead class="thead-dark">
                <tr>
                    <th class="text-center" scope="col">Código</th>
                    <th class="text-center" scope="col">Curso</th>
                    <th class="text-center" scope="col">Nivel</th>
                    <th class="text-center" scope="col">Grado</th>
    
                </tr>
                </thead>
                <tbody>
                    @if ($cursos->count())
                        @foreach($cursos as $itemcurso)
                            <tr>
                                <td class="text-center">{{$itemcurso->CODIGO}}</td>
                                <td class="text-center">{{$itemcurso->CURSO}}</td>
                                <td class="text-center">{{$itemcurso->NIVEL->NIVEL}}</td>
                                <td class="text-center">{{$itemcurso->GRADO->GRADO}}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4">¡No hay registros!</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <div class="col-md-2">
                <a href="{{route('curso.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Insertar   </a>
                <a href="{{route('curso.confirmar',$itemcurso->IDCURSO)}}" class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</a>
            </div>
            
            @if(session('datos'))
                <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                    {{ session('datos') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="text-center">{{$cursos->links()}}</div>
            
        </div>
        
    </div>
    
@endsection

@section('scripts')
    
    <script src="/calendario/js/bootstrap-datepicker.min.js"></script>
    <script src="/calendario/locales/bootstrap-datepicker.es.min.js"></script>
    <script src="/select2/bootstrap-select.min.js"></script>
    <script src="{{asset('js/propio/docente/create.js')}}"></script>

@endsection