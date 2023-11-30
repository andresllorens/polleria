<aside class="main-sidebar" id="sidebar-wrapper">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        {{-- <div class="user-panel">
            <div class="pull-left image">
                <img src="@if(Auth::user()->empleado !== null && Auth::user()->empleado->foto !== null){{url('images/perfiles/' . Auth::user()->empleado->foto)}}@else{{url('images/app/usuario.png')}}@endif" class="img-circle"
                     alt="User Image"/>
            </div>
            <div class="pull-left info">
                @if (Auth::guest())
                <p>HI</p>
                @else
                    <p>{{ Auth::user()->name}}</p>
                @endif
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div> --}}

        
        <!-- Sidebar Menu -->

        <ul class="sidebar-menu">
            @include('layouts.app.menu')
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>