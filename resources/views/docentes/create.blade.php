@extends('layouts.plantilla')
@section('titulo')
    <h3>Crear Registro</h3>
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
        <form method="POST" action="{{ route('docente.store')}}">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">APELLIDOS Y NOMBRES</label>
                    <input type="text" class="form-control @error('APENOM') is-invalid @enderror" id="APENOM" name="APENOM" value="{{old('APENOM')}}">
                    @error('APENOM')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">DNI</label>
                    <input type="text" class="form-control @error('DNI') is-invalid @enderror" id="DNI" name="DNI" onkeypress="return solonumeros(event)" value="{{old('DNI')}}">
                    @error('DNI')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Dirección</label>
                    <input type="text" class="form-control @error('DIRECCION') is-invalid @enderror" id="DIRECCION" name="DIRECCION" value="{{old('DIRECCION')}}">
                    @error('DIRECCION')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">ESTADO CIVIL</label>
                    <select class="form-control @error('ESTADOCIVIL') is-invalid @enderror" name="ESTADOCIVIL" id="ESTADOCIVIL">
                        <option value="">SELECCIONAR ESTADO CIVIL</option>
                        <option value="CASADO">CASADO</option>
                        <option value="SOLTERO">SOLTERO</option>
                    </select>
                    @error('ESTADOCIVIL')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Telefono</label>
                    <input type="text" class="form-control @error('TELEFONO') is-invalid @enderror" id="TELEFONO" name="TELEFONO" onkeypress="return solonumeros(event)" value="{{old('TELEFONO')}}">
                    @error('TELEFONO')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Seguro Social</label>
                    <input type="text" class="form-control @error('SEGUROSOCIAL') is-invalid @enderror" id="SEGUROSOCIAL" name="SEGUROSOCIAL" value="{{old('SEGUROSOCIAL')}}">
                    @error('SEGUROSOCIAL')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Fecha de Ingreso</label>
                    <input type="date" class="form-control @error('FECINGRESO') is-invalid @enderror" id="FECINGRESO" name="FECINGRESO" value="{{old('FECINGRESO')}}">
                    @error('FECINGRESO')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Grabar</button>
            <a href="{{ route('cancelar1')}}" class="btn btn-danger"><i class="fa fa-ban"></i> Cancelar</a>
        </form>
    </div>
@endsection
