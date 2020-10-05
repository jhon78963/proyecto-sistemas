@extends('layouts.plantilla')
@section('titulo')
    <h3>Crear Registro</h3>
@endsection
@section('contenido')
@section('contenido')
    <div class="x_title">
        <h2>Mantenimiento de<b> Alumnos</b></h2>
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
        <div class="col-10">
            <form method="POST" action="{{route('alumno.store')}}">
                @csrf
                <div class="d-none">
                    <input type="text" name="FECMATRICULA" value="{{$datos->FECMATRICULA}}">
                    <input type="text" name="IDNIVEL" value="{{$datos->IDNIVEL}}">
                    <input type="text" name="IDGRADO" value="{{$datos->IDGRADO}}">
                    <input type="text" name="IDSECCION" value="{{$datos->IDSECCION}}">
                </div>
                <div class="form-row">
                    <div class="col-lg mb-3">
                        <label class="" for="IDALUMNO">CODIGO EDUCANDO</label>
                        <input class="form-control" type="text" name="IDALUMNO" value="{{$IDALUMNO}}" readonly>
                    </div>
                    <div class="col-lg mb-3">
                        <label class="" for="IDMATRICULA">NRO MATRICULA</label>
                        <input class="form-control" type="NUMBER" name="IDMATRICULA" value="{{$datos->IDMATRICULA}}" readonly>
                    </div>
                    <div class="col-auto mb-3 align-self-end">
                        <input class="btn btn-info" type="button" value="DETALLE">
                    </div>
                    <div class="col-lg mb-3">
                        <label class="" for="MODULAR">CODIGO MODULAR</label>
                        <input class="form-control" type="text" name="MODULAR" value="">
                    </div>
                    <div class="col-lg mb-3">
                        <label class="" for="DNI">DNI</label>
                        <input class="form-control" type="text" name="DNI" value="">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-lg mb-3">
                        <label class="" for="APELLIDOPATERNO">APELLIDO PATERNO</label>
                        <input class="form-control" type="TEXT" name="APELLIDOPATERNO" value="{{$datos->APELLIDOPATERNO}}">
                    </div>
                    <div class="col-lg mb-3">
                        <label class="" for="APELLIDOMATERNO">APELLIDO MATERNO</label>
                        <input class="form-control" type="text" name="APELLIDOMATERNO" value="{{$datos->APELLIDOMATERNO}}">
                    </div>
                    <div class="col-lg mb-3">
                        <label class="" for="PRIMERNOMBRE">PRIMER NOMBRE</label>
                        <input class="form-control" type="TEXT" name="PRIMERNOMBRE" value="{{$datos->PRIMERNOMBRE}}">
                    </div>
                    <div class="col-lg mb-3">
                        <label class="" for="OTROSNOMBRES">OTROS NOMBRES</label>
                        <input class="form-control" type="text" name="OTROSNOMBRES" value="{{$datos->OTROSNOMBRES}}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-lg mb-3">
                        <label class="" for="SEXO">SEXO</label>
                        <select class="form-control" name="SEXO" id="" autocomplete="off">
                            <option value="MASCULINO">MASCULINO</option>
                            <option value="FEMENINO">FEMENINO</option>
                        </select>
                    </div>
                    <div class="col-lg-auto mb-3">
                        <label class="" for="FECNACIMIENTO">FECHA DE NACIMIENTO</label>
                        <input class="form-control" type="DATE" name="FECNACIMIENTO" value="<?php echo date("Y-m-d");?>">
                    </div>
                    <div class="col-md col-xl-auto mb-3">
                        <label class="" for="IDPAIS">PAIS</label>
                        <select class="form-control" name="IDPAIS" id="PAIS" autocomplete="off">
                            <option value="">Seleccione pais</option>
                            @foreach ($paises as $pais)
                                <option value="{{$pais->IDPAIS}}">{{$pais->PAIS}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xl mb-3">
                        <label class="" for="ESCALA">ESCALA</label>
                        <input class="form-control" type="TEXT" name="ESCALA" value="{{$datos->ESCALA}}">
                    </div>
                    <div class="col-xl mb-3">
                        <label class="" for="AÑOINGRESO">AÑO DE INGRESO</label>
                        <input class="form-control" type="TEXT" onkeypress="return solonumeros(event)" minlength="4" maxlength="4" placeholder="20XX" name="AÑOINGRESO" value="{{$datos->AÑOINGRESO}}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md col-xl mb-3">
                        <label class="" for="IDDEPARTAMENTO">DEPARTAMENTO</label>
                        <select class="form-control" name="IDDEPARTAMENTO" id="DEPARTAMENTO" autocomplete="off">
                            <option value="">Seleccione departamento</option>
                        </select>
                    </div>
                    <div class="col-md col-xl mb-3">
                        <label class="" for="IDPROVINCIA">PROVINCIA</label>
                        <select class="form-control" name="IDPROVINCIA" id="PROVINCIA" autocomplete="off">
                            <option value="">Seleccione provincia</option>
                        </select>
                    </div>
                    <div class="col-md col-xl mb-3">
                        <label class="" for="IDDISTRITO">DISTRITO</label>
                        <select class="form-control" name="IDDISTRITO" id="DISTRITO" autocomplete="off">
                            <option value="">Seleccione distrito</option>
                        </select>
                    </div>
                </div>
                <div class="form-row justify-content-end">
                    <div class="col-lg-auto mb-3">
                        <label class="" for="LENGUAMAT">LENGUA MATERNA</label>
                        <select class="form-control" name="LENGUAMAT" id="PAIS" autocomplete="off">
                            <option value="CASTELLANO">CASTELLANO</option>
                            <option value="INGLES">INGLES</option>
                            <option value="FRANCES">FRANCES</option>
                        </select>
                    </div>
                    <div class="col-md col-xl-auto mb-3">
                        <label class="" for="ESTADOCIVIL">ESTADO CIVIL</label>
                        <select class="form-control" name="ESTADOCIVIL" id="">
                            <option value="CASADO">CASADO</option>
                            <option value="SOLTERO">SOLTERO</option>
                        </select>
                    </div>
                    <div class="col-md col-xl-auto mb-3">
                        <label class="" for="RELIGION">RELIGION</label>
                        <select class="form-control" name="RELIGION" id="">
                            <option value="CATOLICA">CATOLICA</option>
                            <option value="ATEO">ATEO</option>
                        </select>
                    </div>
                </div>
                <div class="form-row justify-content-end">
                    <div class="col-lg-auto mb-3">
                        <label class="" for="FECBAUTIZO">FECHA DE BAUTIZO</label>
                        <input class="form-control" type="DATE" name="FECBAUTIZO" value="<?php echo date("Y-m-d");?>">
                    </div>
                    <div class="col-lg mb-3">
                        <label class="" for="PARROQUIA">PARROQUIA</label>
                        <input class="form-control" type="text" name="PARROQUIA">
                    </div>
                    <div class="col-lg mb-3">
                        <label class="" for="LASTCOLEGIO">COLEGIO DE PROCEDENCIA</label>
                        <input class="form-control" type="text" name="LASTCOLEGIO">
                    </div>
                </div>
                <h2>DATOS DEL DOMICILIO</h2>
                <div class="form-row justify-content-end">
                    <div class="col-lg mb-3">
                        <label class="" for="DIRECCION">DIRECCION</label>
                        <input class="form-control" type="text" name="DIRECCION">
                    </div>
                    <div class="col-md col-xl mb-3">
                        <label class="" for="TELEFONO">TELEFONO</label>
                        <input class="form-control" type="TEXT" name="TELEFONO" onkeypress="return solonumeros(event)" maxlength="11">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md col-xl mb-3">
                        <label class="" for="DOMDEPARTAMENTO">DEPARTAMENTO</label>
                        <select class="form-control" name="DOMDEPARTAMENTO" id="DOMDEPARTAMENTO" autocomplete="off">
                            <option value="">Seleccione departamento</option>
                        </select>
                    </div>
                    <div class="col-md col-xl mb-3">
                        <label class="" for="DOMPROVINCIA">PROVINCIA</label>
                        <select class="form-control" name="DOMPROVINCIA" id="DOMPROVINCIA" autocomplete="off">
                            <option value="">Seleccione provincia</option>
                        </select>
                    </div>
                    <div class="col-md col-xl mb-3">
                        <label class="" for="DOMDISTRITO">DISTRITO</label>
                        <select class="form-control" name="DOMDISTRITO" id="DOMDISTRITO" autocomplete="off">
                            <option value="">Seleccione distrito</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <h2 class="col-12">DATOS DE SERVICIOS Y OTROS DEL DOMICILIO</h2>
                    <div class="col mb-3">
                        <label class="" for="TRANSPORTE">TIPO DE TRANSPORTE</label>
                        <select class="form-control" name="TRANSPORTE" id="">
                            <option value="A PIE">A PIE</option>
                            <option value="MICROBUS">MICROBUS</option>
                            <option value="TREN">TREN</option>
                        </select>
                    </div>
                    <div class="colmb-3">
                        <label class="" for="TIMETRANSPORTE">DEMORA EN LLEGAR AL CE...</label>
                        <input class="form-control" type="TEXT" name="TIMETRANSPORTE" onkeypress="return solonumeros(event)" maxlength="11">
                    </div>
                    <div class="col-md col-xl-auto mb-3">
                        <label class="" for="MATERIAL">MATERIAL</label>
                        <select class="form-control" name="MATERIAL" id="">
                            <option value="LADRILLO Y/O CEMENTO">LADRILLO Y/O CEMENTO</option>
                        </select>
                    </div>
                    <div class="col-md col-xl-auto mb-3">
                        <label class="" for="ENERGIA">ENERGIA ELECTRICA</label>
                        <select class="form-control" name="ENERGIA" id="">
                            <option value="INSTALACION DOMICILIARIA">INSTALACION DOMICILIARIA</option>
                        </select>
                    </div>
                    <div class="col-md col-xl-auto mb-3">
                        <label class="" for="AGUA">AGUA POTABLE</label>
                        <select class="form-control" name="AGUA" id="">
                            <option value="INSTALACION COMPARTIDA">INSTALACION COMPARTIDA</option>
                        </select>
                    </div>
                    <div class="col-md col-xl-auto mb-3">
                        <label class="" for="DESAGUE">DESAGUE</label>
                        <select class="form-control" name="DESAGUE" id="">
                            <option value="INSTAL. DOMICILIARIA DE RED PUBLICA">INSTAL. DOMICILIARIA DE RED PUBLICA</option>
                        </select>
                    </div>
                    <div class="col-md col-xl-auto mb-3">
                        <label class="" for="SSHH">SS.HH.</label>
                        <select class="form-control" name="SSHH" id="">
                            <option value="INODORO CON AGUA CORRIENTE">INODORO CON AGUA CORRIENTE</option>
                        </select>
                    </div>
                    <div class="col-md col-xl mb-3">
                        <label class="" for="HABITACIONES">NRO. HABITACIONES</label>
                        <input class="form-control" type="TEXT" name="HABITACIONES" onkeypress="return solonumeros(event)" maxlength="2">
                    </div>
                    <div class="col-md col-xl mb-3">
                        <label class="" for="HABITANTES">NRO. HABITANTES</label>
                        <input class="form-control" type="TEXT" name="HABITANTES" onkeypress="return solonumeros(event)" maxlength="2">
                    </div>
                    <div class="col-md col-xl-auto mb-3">
                        <label class="" for="SITUACION">SITUACION</label>
                        <select class="form-control" name="SITUACION" id="">
                            <option value="PROMOVIDO">PROMOVIDO</option>
                        </select>
                    </div>
                </div>

                <div class="btn-group">
                    <input class="btn btn-success" type="submit" value="REGISTRAR ALUMNO">
                    <a class="btn btn-primary" href="{{route('matricula.create')}}">VOLVER</a>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('js/propio/alumno/create.js')}}"></script>
@endsection
