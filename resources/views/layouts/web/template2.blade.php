@extends('layouts.web.template')

@section('encabezado')

    @yield('encabezado')

@endsection

@section('content')

    <div class="row">
        <div class="col-md-3">

            @yield('col-left')

        </div>
        <!-- /.col -->
        <div class="col-md-9">

            @yield('col-right')

        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->


@endsection