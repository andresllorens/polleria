@extends('layouts.web.template')

@section('encabezado')

    @yield('encabezado')

@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">

            @yield('col-alerts')

        </div>
    </div>
    
    <div class="row">
        <div class="col-md-3">

            @yield('col-left')

        </div>
        <!-- /.col -->
        <div class="col-md-6">

            @yield('col-central')

        </div>
        <!-- /.col -->
        <div class="col-md-3">

            @yield('col-right')

        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->


@endsection