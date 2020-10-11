<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/adminlte/images/insginias.ico" type="image/ico" />

    <title>Fleming College | Trujillo – Perú</title>

    <!-- Bootstrap -->
    <link href="/adminlte/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/adminlte/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/adminlte/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="/adminlte/build/css/custom.min.css" rel="stylesheet">
    @yield('estilos')
  </head>

  <body class="nav-md footer_fixed">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="{{URL::to('/bienvenido')}}" class="site_title"><i class="fa fa-university"></i> <span>Fleming College</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="/adminlte/images/img.jpg" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Administrador</span>
                            <h2>{{auth()->user()->name}}</h2>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                <li>
                                    <a><i class="fa fa-tasks"></i> Niveles de Estudio <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" id="NIVELES">
                                        @foreach($niveles as $nivel)
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    {{$nivel->NIVEL}}
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                    @foreach($nivel->grados as $grado)
                                                        <a class="dropdown-item" href="{{ route('grados-de-estudios.buscar',$grado->IDGRADO) }}">
                                                            {{$grado->GRADO}}
                                                        </a>
                                                    @endforeach
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-edit"></i> Matricula <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                    <li><a href="{{route('curso.index')}}">Cursos</a></li>
                                    <li><a href="{{route('docente.index')}}">Docente</a></li>
                                    <li><a href="{{route('catedra.index')}}">Cátedra</a></li>
                                    <li><a href="{{route('ubicacion.index')}}">Ubicación Geográfica</a></li>
                                    <li><a href="{{route('alumno.index')}}">Alumno</a></li>
                                    <li><a href="{{route('matricula.create')}}">Matricula</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-usd"></i>Tesorería <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                    <li><a href="{{route('concepto.index')}}">Conceptos</a></li>
                                    <li><a href="{{route('concepto.asignacion')}}">Conceptos por Escala</a></li>
                                    <li><a href="#">Asginacion Escala</a></li>
                                    <li><a href="#">Condonacion Deuda</a></li>
                                    <li><a href="#">Devoluciones</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Salir" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                    <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">
                    <ul class=" navbar-right">
                    @guest
                        <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                        <a class="user-profile dropdown-toggle" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <img src="/adminlte/images/img.jpg" alt="">
                        {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item"  href="{{URL::to('/profile')}}"> Perfil</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Salir') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            </div>
                        </li>
                    @endguest
                    </ul>
                </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="page-title">
                    <div class="title_left">
                        @yield('titulo')
                    </div>
                    <div class="title_right">
                        <div class="col-md-6 col-sm-6 form-group pull-right top_search">
                            <div class="input-group">
                                @yield('buscador')
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12  ">
                        <div class="x_panel">
                            @yield('contenido')
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12  ">
                        <div class="x_panel">
                            @yield('contenidoCurso')
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    <a>Fleming College Admin Template by UNT</a>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="/adminlte/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/adminlte/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="/adminlte/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="/adminlte/vendors/nprogress/nprogress.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="/adminlte/build/js/custom.min.js"></script>
    {{-- Scripts Propios --}}
    @yield('scripts')
    {{-- Codigo Extra --}}
    <script>
        function solonumeros(e){
            key = e.keyCode || e.which;
            teclado = String.fromCharCode(key);
            numeros = '0123456789';
            especiales = [8,9,37,38,39,40,46];
            teclado_especial = false;

            for ( i in especiales ) {
                if ( key == especiales[i] ) {
                    teclado_especial = true;
                }
            }
            if ( numeros.indexOf(teclado) == -1 && !teclado_especial ) {
                return false;
            }
        }
    </script>
  </body>
</html>
