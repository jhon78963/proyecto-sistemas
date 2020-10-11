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
        <form method="POST" action="{{ route('catedra.store')}}"> 
            @csrf
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

            <br>

            

            <div class="row">
                <table id="detalle" class="table table-striped jambo_table bulk_action col-md-10">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center" scope="col">Código</th>
                            <th class="text-center" scope="col">Curso</th>
                            <th class="text-center" scope="col">Grado</th>
                            <th class="text-center" scope="col">Seccion</th>
                            <th class="text-center" scope="col">Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        @foreach($catedras as $itemcatedra)
                            @if ($itemcatedra->IDDOCENTE == 1)
                            <tr>
                                <td class="text-center">{{$itemcatedra->cursos->CODIGO}}</th>
                                <td class="text-center">{{$itemcatedra->docente->APENOM}}</th>
                                <td class="text-center">{{$itemcatedra->cursos->grado->GRADO}}</th>
                                <td class="text-center">{{$itemcatedra->cursos->seccion->SECCION}}</th>
                            </tr>
                            @endif   
                        @endforeach
                         
                    </tbody>
                </table>
                <div class="col-md-2">
                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#addCatedra"><i class="fa fa-plus"></i> Agregar   </a>
                    {{-- <a href="{{_{{route('catedra.create')}}_route('catedra.confirmar',$itemcatedra->IDCATEDRA)}}" class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</a> --}}
                </div>
                
                @if(session('datos'))
                    <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                        {{ session('datos') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                
            </div>

            <div class="modal fade" id="addCatedra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar curso</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <label for="">Curso</label>
                            <select class="form-control select2 select2-hidden-accessible selectpicker" name="idcurso" id="idcurso" onchange="agregar();" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" data-live-search="true">
                                <option selected disabled hidden style='display: none' value='-1'>Seleccione curso</option>
                                @foreach ($cursos as $itemcurso)
                            <option value="{{$itemcurso->IDCURSO}}_{{$itemcurso->CODIGO}}_{{$itemcurso->CURSO}}_{{$itemcurso->grado->GRADO}}_{{$itemcurso->seccion->SECCION}}">{{$itemcurso->grado->GRADO}} - {{$itemcurso->CURSO}} - {{$itemcurso->seccion->SECCION}}</option>
                                @endforeach
                            </select>
                        </div>
                        <p>Select "Volver" below if you are ready to exit.</p>
                    </div>
                    <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Volver</button>
                    </div>
                </div>
                </div>
            </div>
            <input id="btnSubmit" type="submit" value="Grabar" class="btn btn-success" onclick="return confirm('Grabar ?')">
        </form>
    </div>
    
@endsection

@section('scripts')
    <script src="/calendario/js/bootstrap-datepicker.min.js"></script>
    <script src="/calendario/locales/bootstrap-datepicker.es.min.js"></script>
    <script src="/select2/bootstrap-select.min.js"></script>
    <script src="{{asset('js/propio/docente/create.js')}}"></script>
    <script src="{{asset('js/propio/curso/agregar.js')}}"></script>
@endsection