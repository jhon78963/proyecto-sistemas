@extends('layouts.plantilla')
@section('titulo')
    <h3>Matricular Alumno</h3>
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
        <div class="col-10">
            <form method="POST" action="{{route('matricula.store')}}">
                @csrf
                <div class="form-row">
                    <div class="col-lg mb-3">
                        <label class="" for="IDALUMNO">CODIGO DEL EDUCANDO</label>
                        <select class="form-control" name="IDALUMNO" id="ALUMNO" autocomplete="off">
                            <option value="{{$id_alumno}}">NUEVO ALUMNO</option>
                            @foreach ($alumnos as $alumno)
                                <option value="{{$alumno->IDALUMNO}}">{{$alumno->IDALUMNO}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg mb-3">
                        <label class="" for="IDMATRICULA">NRO MATRICULA</label>
                        <input class="form-control" type="NUMBER" name="IDMATRICULA" value="{{$id}}" readonly autocomplete="off">
                    </div>
                    <div class="col-lg-auto mb-3">
                        <label class="" for="FECMATRICULA">FECHA DE MATRICULA</label>
                        <input class="form-control" type="DATE" name="FECMATRICULA" value="<?php echo date("Y-m-d");?>" required autocomplete="off">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-lg mb-3">
                        <label class="" for="APELLIDOPATERNO">APELLIDO PATERNO</label>
                        <input class="form-control" type="TEXT" name="APELLIDOPATERNO" id="APELLIDOPATERNO" required autocomplete="off">
                    </div>
                    <div class="col-lg mb-3">
                        <label class="" for="APELLIDOMATERNO">APELLIDO MATERNO</label>
                        <input class="form-control" type="text" name="APELLIDOMATERNO" id="APELLIDOMATERNO" required autocomplete="off">
                    </div>
                    <div class="col-lg mb-3">
                        <label class="" for="PRIMERNOMBRE">PRIMER NOMBRE</label>
                        <input class="form-control" type="TEXT" name="PRIMERNOMBRE" id="PRIMERNOMBRE" required autocomplete="off">
                    </div>
                    <div class="col-lg mb-3">
                        <label class="" for="OTROSNOMBRES">OTROS NOMBRES</label>
                        <input class="form-control" type="text" name="OTROSNOMBRES" id="OTROSNOMBRES" required autocomplete="off">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md col-xl mb-3">
                        <label class="" for="IDNIVEL">NIVEL</label>
                        <select class="form-control" name="IDNIVEL" id="NIVEL" autocomplete="off">
                            <option value="">Seleccione nivel</option>
                            @foreach ($niveles as $nivel)
                                <option value="{{$nivel->IDNIVEL}}">{{$nivel->NIVEL}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md col-xl mb-3">
                        <label class="" for="IDGRADO">AÑO</label>
                        <select class="form-control" name="IDGRADO" id="GRADO" autocomplete="off">
                            <option value="">Seleccione año</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md col-xl mb-3">
                        <label class="" for="IDSECCION">SECCION</label>
                        <select class="form-control" name="IDSECCION" id="SECCION" autocomplete="off">
                            <option value="">Seleccione seccion</option>
                        </select>
                    </div>
                    <div class="col-xl mb-3">
                        <label class="" for="ESCALA">ESCALA</label>
                        <input class="form-control" type="TEXT" name="ESCALA" required autocomplete="off">
                    </div>
                    <div class="col-xl mb-3">
                        <label class="" for="AÑOINGRESO">AÑO DE INGRESO</label>
                        <input class="form-control" type="TEXT" onkeypress="return solonumeros(event)" minlength="4" maxlength="4" placeholder="20XX" name="AÑOINGRESO" required autocomplete="off">
                    </div>
                </div>

                <div class="btn-group">
                    <input class="btn btn-success" type="submit" id="GRABR" value="SIGUIENTE">
                    <a class="btn btn-primary" href="{{route('matricula.index')}}">VER MATRICULAS</a>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('js/propio/matricula/create.js')}}"></script>
    <script>
        // var grabar = false;
        // $(function() {
        //     $(document).on('click', 'input[type="submit"]', function(event) {
        //         grabar = true;
        //         // console.log("Se presionó el Boton con Id :"+ id_init)
        //     });
        // });
        // window.addEventListener("beforeunload", function (e) {
        //     if(!grabar){
        //         var confirmationMessage = "\o/";

        //         (e || window.event).returnValue = confirmationMessage; //Gecko + IE
        //         return confirmationMessage;                            //Webkit, Safari, Chrome
        //     }
        //     grabar = false;
        // });
    </script>
@endsection
