@extends('layouts.plantilla')

@section('titulo')
    <h3>Editar Usuario</h3>
@endsection

@section('contenido')
    <div class="x_title">
        <h2>Mantenimiento de<b> Usuarios</b></h2>
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
        <form method="POST" action="{{route('profile.update',$user->id)}}">
            @method('put')
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <label class="" for="id">Código Usuario</label>
                    <input class="form-control" type="text" name="id" value="{{$user->id}}" readonly><br>
                </div>
                
                <div class="col-md-4">
                    <label class="" for="name">Nombre(s)</label>
                    <input class="form-control" type="text" name="name" value="{{$user->name}}">
                </div>
                <div class="col-md-4">
                    <label class="" for="last_name">Apellido(s)</label>
                    <input class="form-control" type="text" name="last_name" value="{{$user->last_name}}">
                </div>
                
                <div class="col-md-8">
                    <label class="" for="address">Dirección</label>
                    <input class="form-control" type="text" name="address" value="{{$user->address}}">
                </div>
                <div class="col-md-4">
                    <label class="" for="address">Facebook</label>
                    <input class="form-control" type="text" name="address" value="{{$user->facebook}}">
                </div>
            </div>
            <br>
            <div>
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Grabar</button>
                <a class="btn btn-primary" href="{{route('profile.index')}}"><i class="fa fa-ban"></i> Cancelar</a>
            </div>
        </form>
    </div>
@endsection