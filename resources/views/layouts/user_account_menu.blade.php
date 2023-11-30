<!-- User Account Menu -->
<li class="dropdown user user-menu">
    <!-- Menu Toggle Button -->
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <!-- The user image in the navbar-->
        <img src="@if(Auth::user()->empleado !== null && Auth::user()->empleado->foto !== null){{url('images/perfiles/' . Auth::user()->empleado->foto)}}@else{{url('images/app/usuario.png')}}@endif" class="user-image" alt="User Image">
        <!-- hidden-xs hides the username on small devices so only the image appears. -->
        <span class="hidden-xs">{{ Auth::user()->name }}</span>
    </a>
    <ul class="dropdown-menu">
        <!-- The user image in the menu -->
        <li class="user-header" style="height: auto !important;">
            <img src="@if(Auth::user()->empleado !== null && Auth::user()->empleado->foto !== null){{url('images/perfiles/' . Auth::user()->empleado->foto)}}@else{{url('images/app/usuario.png')}}@endif" class="img-circle" alt="User Image">

            <p>{{ Auth::user()->name }}</p>
        </li>
        <li class="user-footer">
            <!-- <a class="pull-right" style="color: #777 !important;" href="{{url('perfil')}}"><i class="fa fa-fw fa-user"></i>Mi Perfil</a> -->
            <a class="pull-right" style="color: #777 !important;" href="{{url('trabajo_en_progreso')}}"><i class="fa fa-fw fa-user"></i>Mi Perfil</a>
            <a class="pull-right" style="color: #777 !important;" href="{{url('perfil/cambiar_clave')}}"><i class="fa fa-fw fa-key"></i>Cambiar contraseña</a>
            <a class="pull-right" style="color: #777 !important;" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-fw fa-sign-out"></i>Cerrar Sesión</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
        <!-- Menu Body -->
        <!--<li class="user-body">
                                    <div class="row">
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Followers</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Sales</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Friends</a>
                                        </div>
                                    </div>
                                    <! -- /.row -->
        <!--</li>-->
        <!-- Menu Footer-->
        <!--<li class="user-footer">
                                    <div class="pull-left">
                                        <a href="{{url('perfil')}}" class="btn btn-default btn-flat">Perfil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Cerrar Sesión</a>
                                    </div>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>-->
    </ul>
</li>