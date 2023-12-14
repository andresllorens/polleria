<!DOCTYPE html>
<html ng-app="intranet">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mi Polleria</title>
    <link rel="shortcut icon" href="{{url('favicon.ico')}}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    @include('layouts.web.css')

    @yield('css')

</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

    <header class="main-header">
        <nav class="navbar navbar-static-top">
            <div class="container" >
                <div class="navbar-header">
                    <img src="{{ url('images/logo.min.png') }}" alt="logo" style="margin-left: -15px;float: left;height: 30px; padding-left: 20px; padding-right: 4px; margin-top: 10px;">
                    <a href="{{url('/')}}" class="navbar-brand"><b>Mi Polleria</b></a>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                    <ul class="nav navbar-nav">

                        @include('layouts.web.menu')

                    </ul>
                    {{--
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" id="navbar-search-input" placeholder="Búsqueda">
                        </div>
                    </form>--}}
                </div>
                <!-- /.navbar-collapse -->
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        @if (Auth::guest())
                            @if(!Request::is('login'))
                            <li><a href="{{ route('login') }}">Ingreso de Usuario</a></li>
                            @endif
                        {{--<li><a href="{{ route('register') }}">Registro</a></li>-->--}}
                        @else

                            <li class="dropdown messages-menu">
                                <!-- Menu toggle button -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <i class="fa fa-bell-o"></i>
                                    @if(Auth::user()->notificacionesSinLeer() > 0)
                                    <span class="label label-danger"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ Auth::user()->notificacionesSinLeer() }}</font></font></span>
                                    @endif
                                </a>
                                <ul class="dropdown-menu" style="width: auto !important;min-width: 250px !important;">
                                    <li class="header"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Notificaciones</font></font></li>
                                    @if(Auth::user()->notificacionesSinLeer() > 0)
                                    <li class="header"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tienes {{ Auth::user()->notificacionesSinLeer() }} notificaciones sin leer</font></font></li>
                                    @endif
                                    <li>
                                        <!-- inner menu: contains the messages -->
                                        <ul class="menu" style="height: auto !important;">
                                            @foreach(Auth::user()->notificacionesRecibidas() as $notificacion)
                                            <li><!-- start message -->
                                                <a href="{{url( 'notificacion/'.$notificacion->id )}}">
                                                    <!-- Message title and timestamp -->
                                                    <h4 style="margin: 0px !important;">
                                                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;margin-right: 100px">
                                                                {{ substr($notificacion->texto_corto, 0, 20) }}
                                                            </font></font><small><i class="fa fa-clock-o"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> {{ $notificacion->created_at }}</font></font></small>
                                                    </h4>
                                                    <!-- The message -->
                                                    <p style="margin: 0px !important;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ substr($notificacion->titulo, 0, 50) }}</font></font></p>
                                                </a>
                                            </li>
                                            <!-- end message -->
                                            @endforeach
                                        </ul>
                                        <!-- /.menu -->
                                    </li>
                                    <li class="footer"><a href="{{url( 'notificaciones' )}}"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ver todas las notificaciones</font></font></a></li>
                                </ul>
                            </li>

                            <!-- Marcación home office -->
                            <?php
                                $marcacion = Auth::user()->ultimaMarcacion();

                                $estadoUsuarioMarcacion = App\Models\MarcacionHorario::ESTADO_USUARIO_DESCONECTADO;
                                $claseCssMarcacion = "danger";
                                $fechaHoraMarcacion = "";

                                if($marcacion){

                                    $estadoUsuarioMarcacion = $marcacion->user_estado;
                                    $fechaHoraMarcacion = $marcacion->fecha_hora;

                                    switch($estadoUsuarioMarcacion){

                                        case App\Models\MarcacionHorario::ESTADO_USUARIO_DESCONECTADO: $claseCssMarcacion = "danger"; break;
                                        case App\Models\MarcacionHorario::ESTADO_USUARIO_CONECTADO: $claseCssMarcacion = "success"; break;
                                        case App\Models\MarcacionHorario::ESTADO_USUARIO_BREAK: $claseCssMarcacion = "warning"; break;
                                    }

                                }
                            ?>
                            <li class="dropdown messages-menu">
                                <!-- Menu toggle button -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <i class="fa fa-home"></i>
                                    <span class="label label-{{ $claseCssMarcacion }}">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">
                                                {{ $estadoUsuarioMarcacion }}
                                            </font>
                                        </font>
                                    </span>
                                </a>
                                <ul class="dropdown-menu" style="width: auto !important;min-width: 250px !important;">
                                    
                                    <li class="header"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Sistema de Marcaciones Home Office</font></font></li>
                                    <li>
                                        <!-- inner menu: contains the messages -->
                                        <ul class="menu" style="height: auto !important;">
                                            <li><!-- start message -->
                                                <a>
                                                    <!-- Message title and timestamp -->
                                                    <h4 style="margin: 0px !important;">
                                                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;margin-right: 100px">
                                                                Estado: <span class="label label-{{ $claseCssMarcacion }}" style="font-size: inherit;">{{ $estadoUsuarioMarcacion }}</span>
                                                            </font></font><small><i class="fa fa-clock-o"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> {{ $fechaHoraMarcacion }}</font></font></small>
                                                    </h4>
                                                </a>
                                            </li>
                                            <!-- end message -->
                                            <li><br></li>
                                            <li class="text-center">

                                            @if($estadoUsuarioMarcacion == App\Models\MarcacionHorario::ESTADO_USUARIO_DESCONECTADO)
                                                <a href="{{url('marcacion_horario?change=' . App\Models\MarcacionHorario::ESTADO_USUARIO_CONECTADO)}}" style="background-color: #00a65a;color: #fff;">Cambiar a {{App\Models\MarcacionHorario::ESTADO_USUARIO_CONECTADO}}</a>
                                            @endif
                                            @if($estadoUsuarioMarcacion == App\Models\MarcacionHorario::ESTADO_USUARIO_CONECTADO)
                                                <a href="{{url('marcacion_horario?change=' . App\Models\MarcacionHorario::ESTADO_USUARIO_DESCONECTADO)}}" style="background-color: #dd4b39;color: #fff;">Cambiar a {{App\Models\MarcacionHorario::ESTADO_USUARIO_DESCONECTADO}}</a>
                                                <a href="{{url('marcacion_horario?change=' . App\Models\MarcacionHorario::ESTADO_USUARIO_BREAK)}}" style="background-color: #f39c12;color: #fff;">Cambiar a {{App\Models\MarcacionHorario::ESTADO_USUARIO_BREAK}}</a>
                                            @endif
                                            @if($estadoUsuarioMarcacion == App\Models\MarcacionHorario::ESTADO_USUARIO_BREAK)
                                                <a href="{{url('marcacion_horario?change=' . App\Models\MarcacionHorario::ESTADO_USUARIO_CONECTADO)}}" style="background-color: #00a65a;color: #fff;">Cambiar a {{App\Models\MarcacionHorario::ESTADO_USUARIO_CONECTADO}}</a>
                                            @endif
                                            
                                            </li>
                                            <li><br></li>
                                        </ul>
                                        <!-- /.menu -->
                                    </li>
                                    <li class="footer"><a><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Home Office</font></font></a></li>
                                </ul>
                            </li>

                        @include('layouts.user_account_menu')
                        
                        @endif
                    </ul>
                </div>
                <!-- /.navbar-custom-menu -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </header>
    <!-- Full Width Column -->
    <div class="content-wrapper">
        <div class="container" >
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    @yield('encabezado')
                </h1>
                <!--<ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Layout</a></li>
                    <li class="active">Top Navigation</li>
                </ol>-->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- /.modal -->

                @yield('content')

            </section>
            <!-- /.content -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="container" >
            <strong>Copyright &copy; {{date('Y')}} <a href="">Mi Polleria</a>.</strong>
        </div>
        <!-- /.container -->
    </footer>
</div>
<!-- ./wrapper -->

<div class="modal fade" id="modal-windows">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 id="modal-title" class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p id="modal-message"></p>
            </div>
            <div class="modal-footer">
                <button id="modal-btn-left-close" type="button" class="btn btn-outline pull-left oculto" data-dismiss="modal"></button>
                <a id="modal-btn-left-accion1" href="" type="button" class="btn btn-outline pull-left oculto"></a>
                <a id="modal-btn-left-accion2" href="" type="button" class="btn btn-outline pull-left oculto"></a>
                <a id="modal-btn-right-accion1" href="" type="button" class="btn btn-outline pull-right oculto"></a>
                <a id="modal-btn-right-accion2" href="" type="button" class="btn btn-outline pull-right oculto"></a>
                <button id="modal-btn-right-close" type="button" class="btn btn-outline pull-right oculto" data-dismiss="modal"></button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


@include('layouts.web.scripts')

@yield('scripts')


</body>
</html>