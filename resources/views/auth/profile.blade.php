@extends('layouts.plantilla')
@section('titulo')
    <h3>Perfil</h3>
@endsection

@section('contenido')
    <div class="x_title">
        <h2>Acerca del  Usuario</h2>
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
        <div class="col-md-12 col-sm-12  profile_left">
            <div class="profile_img col-md-3">
                <div id="crop-avatar">
                <!-- Current avatar -->
                <img class="img-responsive avatar-view" src="adminlte/images/picture.jpg"  alt="Avatar" title="Change the avatar">
                </div>
            </div>
            <div class="row">
                

                <ul class="list-unstyled user_data col-md-9">
                <li><h1>{{auth()->user()->name}} {{auth()->user()->last_name}}</h1></li>
                <li><h3><i class="fa fa-map-marker user-profile-icon"></i> {{auth()->user()->address}}</h3></li>

                <li><h3><i class="fa fa-briefcase user-profile-icon"></i> {{auth()->user()->career}}</h3></li>

                <li class="m-top-xs"><h3></h3>
                    <h3><i class="fa fa-facebook user-profile-icon"></i><a href="{{auth()->user()->facebook}}" target="_blank"> Facebook</a></h3>
                </li>

                <li>
                    <a href="{{route('profile.edit',auth()->user()->id)}}" class="btn btn-info btn-sm" style=" width: 500px; height:50px;"><i class="fa fa-edit" style=" line-height: 40px;"></i> Editar</a>
                </li>
                </ul>
            </div>
            
            
        </div>
        
    </div>  
@endsection