@extends('layouts.plantilla')
@section('titulo')
    <h3>Crear Registro</h3>
@endsection
@section('contenido')

    <div class="x_title">
        <h2>Mantenimiento de<b> Cursos</b></h2>
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
        <form method="POST" action="{{ route('curso.store')}}">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Código</label>
                    <input type="text" class="form-control @error('CODIGO') is-invalid @enderror" id="CODIGO" name="CODIGO" value="{{old('CODIGO')}}">
                    @error('CODIGO')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Curso</label>
                    <input type="text" class="form-control @error('CURSO') is-invalid @enderror" id="CURSO" name="CURSO" value="{{old('CURSO')}}">
                    @error('CURSO')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="">Nivel</label>
                    <select class="form-control" name="IDNIVEL" id="NIVEL">
                        <option value="">Seleccione nivel</option>
                        @foreach ($niveles as $itemnivel)
                            <option value="{{$itemnivel->IDNIVEL}}" {{$itemnivel->IDNIVEL == old('IDNIVEL') ? 'selected' : ''}}>{{$itemnivel->NIVEL}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="">Grado</label>
                    <select class="form-control" name="IDGRADO" id="GRADO">
                        <option value="">Seleccione Grado</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="">Grado</label>
                    <select class="form-control" name="IDSECCION" id="SECCION">
                        <option value="">Seleccione Seccion</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Grabar</button>
            <a href="{{ route('cancelar')}}" class="btn btn-danger"><i class="fa fa-ban"></i> Cancelar</a>
        </form>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('js/propio/curso/edit.js')}}"></script>
@endsection



