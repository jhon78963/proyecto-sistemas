@extends('layouts.plantilla')
@section('titulo')
    <h3>Eliminar Registro</h3>
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
        <h1>Desea Eliminar Código: {{$docente->IDDOCENTE}} - curso: {{$docente->APENOM}}</h1>
	    <form method="POST" action="{{ route('docente.destroy',$docente->IDDOCENTE)}}">
	        @method('delete')
	            @csrf
	            <button type="submit" class="btn btn-danger"><i class="fa fa-check-square"></i> SI</button>
	        <a href="{{ route('cancelar')}}" class="btn btn-primary"><i class="fa fa-times-circle"></i> NO</a>
	    </form>
    </div>

@endsection