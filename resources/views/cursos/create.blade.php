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
                    <select class="form-control @error('IDNIVEL') is-invalid @enderror" name="IDNIVEL" id="NIVEL">
                        <option value="">Seleccione nivel</option>
                        @foreach ($niveles as $itemnivel)
                            <option value="{{$itemnivel->IDNIVEL}}" {{$itemnivel->IDNIVEL == old('IDNIVEL') ? 'selected' : ''}}>{{$itemnivel->NIVEL}}</option>
                        @endforeach
                    </select>
                    @error('IDNIVEL')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="">Grado</label>
                    <select class="form-control @error('IDGRADO') is-invalid @enderror" name="IDGRADO" id="GRADO">
                        <option value="">Seleccione Grado</option>
                        @foreach ($grados as $itemgrado)
                            <option value="{{$itemgrado->IDGRADO}} {{$itemnivel->IDNIVEL == old('IDGRADO') ? 'selected' : ''}}">{{$itemgrado->GRADO}}</option>
                        @endforeach
                    </select>
                    @error('IDGRADO')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Grabar</button>
            <a href="{{ route('cancelar')}}" class="btn btn-danger"><i class="fa fa-ban"></i> Cancelar</a>
        </form>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('js/propio/curso/edit.js')}}"></script>
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



