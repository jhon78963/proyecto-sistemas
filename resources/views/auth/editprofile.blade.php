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
            {{-- <input type="hidden" name="_method" value="PATCH"> --}}

            <div class="form-row">
                <div class="col-lg mb-3">
                    <label class="" for="id">Código Usuario</label>
                    <input class="form-control" type="text" name="id" value="{{$user->id}}" readonly>
                </div>
                <div class="col-lg mb-3">
                    <label class="" for="name">Nombre</label>
                    <input class="form-control" type="text" name="name" value="{{$user->name}}">
                </div>
                <div class="col-lg mb-3">
                    <label class="" for="last_name">DNI</label>
                    <input class="form-control" type="text" name="last_name" value="{{$user->last_name}}">
                </div>
                <div class="col-lg mb-3">
                    <label class="" for="address">DNI</label>
                    <input class="form-control" type="text" name="address" value="{{$user->address}}">
                </div>
            </div>
            <div class="btn-group">
                <input class="btn btn-success" type="submit" value="Grabar">
                <a class="btn btn-primary" href="{{route('profile.index')}}">Volver</a>
            </div>
        </form>
    </div>
@endsection