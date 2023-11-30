<!DOCTYPE html>
<html>
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
            <div class="container">
                <div class="navbar-header">
                    <img src="{{ url('images/logo.min.png') }}" alt="logo" style="margin-left: -15px;float: left;height: 30px; padding-left: 20px; padding-right: 4px; margin-top: 10px;">
                    <a href="{{url('/')}}" class="navbar-brand"></a>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                    <ul class="nav navbar-nav">



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

                </div>
                <!-- /.navbar-custom-menu -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </header>
    <!-- Full Width Column -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="error-page" style="margin-top:100px">
                <h2 class="headline text-@yield('color')"> @yield('error')</h2>

                <div class="error-content">
                    <h3><i class="fa fa-warning text-@yield('color')"></i> @yield('titulo')</h3>

                    <p>
                        @yield('mensaje')
                    </p>


                </div>
                <!-- /.error-content -->
            </div>
            <!-- /.error-page -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="container">
            <div class="pull-right hidden-xs">
                Sociedad de Beneficencia <b>Hospital Italiano</b>.
            </div>
            <strong>Copyright &copy; {{date('Y')}} <a href="">Sistemas HI</a>.</strong>
        </div>
        <!-- /.container -->
    </footer>
</div>
<!-- ./wrapper -->


@include('layouts.web.scripts')

@yield('scripts')


</body>
</html>