<!DOCTYPE html>
<html ng-app="intranet">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Intranet HI</title>
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
                    <a href="{{url('/')}}" class="navbar-brand"><b>Intranet</b>HI</a>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                    <ul class="nav navbar-nav">

                        

                    </ul>
                </div>
                
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
            <div class="pull-right hidden-xs">
                Sociedad de Beneficencia <b>Hospital Italiano</b>.
            </div>
            <strong>Copyright &copy; {{date('Y')}} <a href="">Sistemas HI</a>.</strong>
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