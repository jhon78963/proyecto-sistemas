@extends('layouts.plantilla')
@section('titulo')
    <h3>Editar Registro</h3>
@endsection
@section('contenido')

    <div class="x_title">
        <h2>Mantenimiento de<b> Docentes</b></h2>
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
        <form method="POST" action="{{ route('docente.update',$docente->IDDOCENTE)}}">
            @method('put')
            @csrf
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="">Id</label>
                    <input type="text" class="form-control" id="IDDOCENTE" name="IDDOCENTE" value="{{$docente->IDDOCENTE}}" disabled>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="">Apellidos Y Nombres</label>
                    <input type="text" autocomplete="off" class="form-control @error('APENOM') is-invalid @enderror" id="APENOM" name="APENOM" value="{{$docente->APENOM}}">
                    @error('APENOM')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group  col-md-12">
                    <label for="">DNI</label>
                    <input type="text" autocomplete="off" class="form-control @error('DNI') is-invalid @enderror" id="DNI" name="DNI" onkeypress="return solonumeros(event)" value="{{$docente->DNI}}">
                    @error('DNI')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group  col-md-12">
                    <label for="">Dirección</label>
                    <input type="text" autocomplete="off" class="form-control @error('DIRECCION') is-invalid @enderror" id="DIRECCION" name="DIRECCION" value="{{$docente->DIRECCION}}">
                    @error('DIRECCION')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="">ESTADO CIVIL</label>
                    <select class="form-control" name="ESTADOCIVIL" id="ESTADOCIVIL">
                        <option value="">SELECCIONAR ESTADO CIVIL</option>
                        <option value="CASADO" {{"CASADO" == $docente->ESTADOCIVIL ? 'selected' : ''}}>CASADO</option>
                        <option value="SOLTERO" {{"SOLTERO" == $docente->ESTADOCIVIL ? 'selected' : ''}}>SOLTERO</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group  col-md-12">
                    <label for="">Telefono</label>
                    <input type="text" autocomplete="off" class="form-control @error('TELEFONO') is-invalid @enderror" id="TELEFONO" name="TELEFONO" value="{{$docente->TELEFONO}}">
                    @error('TELEFONO')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group  col-md-12">
                    <label for="">Seguro Social</label>
                    <input type="text" autocomplete="off" class="form-control @error('SEGUROSOCIAL') is-invalid @enderror" id="SEGUROSOCIAL" name="SEGUROSOCIAL" value="{{$docente->SEGUROSOCIAL}}">
                    @error('SEGUROSOCIAL')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group  col-md-12">
                    <label for="">Fecha de Ingreso</label>
                    <input type="date" name="FECINGRESO" class="form-control @error('FECINGRESO') is-invalid @enderror" value="{{ $docente->FECINGRESO}}">
                </div>
                @error('FECINGRESO')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Grabar</button>
            <a href="{{ route('cancelar1')}}" class="btn btn-danger"><i class="fa fa-ban"></i> Cancelar</a>
        </form>
    </div>
@endsection
