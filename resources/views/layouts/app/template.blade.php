<!DOCTYPE html>
<html ng-app="mi-polleria">
<head>
    <meta charset="UTF-8">
    <title>Mi Polleria</title>
    <link rel="shortcut icon" href="{{url('favicon.ico')}}">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    @include('layouts.app.css')

    @yield('css')

</head>

<body class="skin-blue sidebar-mini">
<div class="wrapper">
    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="#" class="logo">
            <strong><i class="fa fa-fw fa-th-large"></i>Gestión</strong>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            {{-- <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                <li><a href="{{url('/')}}" target="_self"><i class="fa fa-fw fa-undo"></i>Inicio</a></li>
                @include('layouts.user_account_menu')
                </ul>
            </div> --}}
        </nav>
    </header>

    <!-- Left side column. contains the logo and sidebar -->
@include('layouts.app.sidebar')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <section class="content-header">
            <h1>

                @yield('encabezado')

            </h1>
            <!--<ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">UI</a></li>
                <li class="active">Sliders</li>
            </ol>-->
        </section>

        <section class="content">

            @if (count($errors) > 0)
            <div class="callout callout-danger">
               <ul>
               @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
               @endforeach
               </ul>
            </div>
            @endif

            @if(session('message_success'))
            <div class="alert alert-success">
                <p>{{ session('message_success') }}</p>
            </div>
            @endif

            @if(session('message_errors'))
            <div class="callout callout-danger">
                <p>{{ session('message_errors') }}</p>
            </div>
            @endif

            @yield('content')

        </section>

    </div>

    <!-- Main Footer -->
    <footer class="main-footer" style="max-height: 100px;text-align: center">
        <strong>Copyright © {{ date('Y') }} <a href="" target="_blank">Mi Polleria</a>.</strong> Todos los derechos reservados.
    </footer>

</div>

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

@include('layouts.app.scripts')

@yield('scripts')

</body>
</html>