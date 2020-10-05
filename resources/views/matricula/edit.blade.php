@extends('layouts.plantilla')
@section('titulo')
    <h3>Editar Registro</h3>
@endsection
@section('contenido')
    <div class="x_title">
        <h2>Mantenimiento de<b> Matriculas</b></h2>
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
        <div class="col-8">
            <form method="POST" action="{{route('matricula.update',$matricula->IDMATRICULA)}}">
                @csrf
                <input type="hidden" name="_method" value="PATCH">

                <div class="form-row">
                    <div class="col-lg mb-3">
                        <label class="" for="IDALUMNO">CODIGO DEL EDUCANDO</label>
                        <input class="form-control" type="NUMBER" name="IDALUMNO" value="{{$matricula->IDALUMNO}}" readonly autocomplete="off">
                    </div>
                    <div class="col-lg mb-3">
                        <label class="" for="IDMATRICULA">NRO MATRICULA</label>
                        <input class="form-control" type="NUMBER" name="IDMATRICULA" value="{{$matricula->IDMATRICULA}}" readonly autocomplete="off">
                    </div>
                    <div class="col-lg-auto mb-3">
                        <label class="" for="FECMATRICULA">FECHA DE MATRICULA</label>
                        <input class="form-control" type="DATE" name="FECMATRICULA" value="{{$matricula->FECMATRICULA}}" autocomplete="off">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-lg mb-3">
                        <label class="" for="APELLIDOPATERNO">APELLIDO PATERNO</label>
                        <input class="form-control" type="TEXT" name="APELLIDOPATERNO" value="{{$matricula->alumno->APELLIDOPATERNO}}" id="APELLIDOPATERNO" autocomplete="off">
                    </div>
                    <div class="col-lg mb-3">
                        <label class="" for="APELLIDOMATERNO">APELLIDO MATERNO</label>
                        <input class="form-control" type="text" name="APELLIDOMATERNO" value="{{$matricula->alumno->APELLIDOMATERNO}}" id="APELLIDOMATERNO" autocomplete="off">
                    </div>
                    <div class="col-lg mb-3">
                        <label class="" for="PRIMERNOMBRE">PRIMER NOMBRE</label>
                        <input class="form-control" type="TEXT" name="PRIMERNOMBRE" value="{{$matricula->alumno->PRIMERNOMBRE}}" id="PRIMERNOMBRE" autocomplete="off">
                    </div>
                    <div class="col-lg mb-3">
                        <label class="" for="OTROSNOMBRES">OTROS NOMBRES</label>
                        <input class="form-control" type="text" name="OTROSNOMBRES" value="{{$matricula->alumno->OTROSNOMBRES}}" id="OTROSNOMBRES" autocomplete="off">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md col-xl mb-3">
                        <label class="" for="IDNIVEL">NIVEL</label>
                        <select class="form-control" name="IDNIVEL" id="NIVEL" autocomplete="off">
                            <option value="">Seleccione nivel</option>
                            @foreach ($niveles as $nivel)
                                <option value="{{$nivel->IDNIVEL}}" {{$nivel->IDNIVEL == $matricula->IDNIVEL ? 'selected' : ''}}>{{$nivel->NIVEL}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md col-xl mb-3">
                        <label class="" for="IDGRADO">GRADO</label>
                        <select class="form-control" name="IDGRADO" id="GRADO" autocomplete="off">
                            <option value="">Seleccione grado</option>
                            @foreach ($grados as $grado)
                                <option value="{{$grado->IDGRADO}}" {{$grado->IDGRADO == $matricula->IDGRADO ? 'selected' : ''}}>{{$grado->GRADO}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md col-xl mb-3">
                        <label class="" for="IDSECCION">SECCION</label>
                        <select class="form-control" name="IDSECCION" id="SECCION" autocomplete="off">
                            <option value="">Seleccione seccion</option>
                            @foreach ($secciones as $seccion)
                                <option value="{{$seccion->IDSECCION}}" {{$seccion->IDSECCION == $matricula->IDSECCION ? 'selected' : ''}}>{{$seccion->SECCION}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xl mb-3">
                        <label class="" for="ESCALA">ESCALA</label>
                        <input class="form-control" type="TEXT" name="ESCALA" value="{{$matricula->alumno->ESCALA}}" autocomplete="off">
                    </div>
                    <div class="col-xl mb-3">
                        <label class="" for="AÑOINGRESO">AÑO DE INGRESO</label>
                        <input class="form-control" type="TEXT" onkeypress="return solonumeros(event)" minlength="4" maxlength="4" placeholder="20XX" name="AÑOINGRESO" value="{{$matricula->AÑOINGRESO}}" autocomplete="off">
                    </div>
                </div>

                <div class="btn-group">
                    <input class="btn btn-success" type="submit" value="Grabar">
                    <a class="btn btn-primary" href="{{route('matricula.index')}}">Volver</a>
                </div>
            </form>
        </div>
    </div>
@endsection
