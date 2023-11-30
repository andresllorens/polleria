@if (!Auth::guest())
<li>
    @if(session('gmail'))
        <a href="{{url('gmail')}}" target="_blank">Correo Electrónico <span class="sr-only">(current)</span></a>
    @else    
        <a href="{{url('correo')}}" target="_blank">Correo Electrónico <span class="sr-only">(current)</span></a>
    @endif
</li>
<li><a href="{{url('aula_virtual')}}" target="_blank">Aula Virtual</a></li>
<li class="{{ Request::is('rrhh/*') ? 'active' : '' }}"><a href="{{url('rrhh/documentos')}}">Recursos Humanos</a></li>
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">RED HI <span class="caret"></span></a>
    <ul class="dropdown-menu" role="menu">
        <li class="{{ Request::is('redintegradadesalud/remotos') ? 'active' : '' }}"><a href="{{url('redintegradadesalud/remotos')}}">Escritorios Remotos</a></li>
        <li><a href="{{url('visual_medica')}}" target="_blank">Visual Médica</a></li>
        <li class="{{ Request::is('medicina/*') ? 'active' : '' }}"><a href="{{url('medicina/protocolos')}}">Protocolos Médicos</a></li>
        @can('hc/solicitud_completado_hc')
            <li class="{{ Request::is('hc/*') ? 'active' : '' }}"><a href="{{url('hc/solicitud_completado_hc')}}">Completado Historia Clínica</a></li>
        @endcan
        <li class="{{ Request::is('redintegradadesalud/geclisawebs') ? 'active' : '' }}"><a href="{{url('redintegradadesalud/geclisawebs')}}">Geclisa Web</a></li>
        <li class="{{ Request::is('redintegradadesalud/gecroswebs') ? 'active' : '' }}"><a href="{{url('redintegradadesalud/gecroswebs')}}">Gecros Web</a></li>
        <li class="{{ Request::is('redintegradadesalud/telemedicina') ? 'active' : '' }}"><a href="{{url('redintegradadesalud/telemedicina')}}">Telemedicina</a></li>
        <li class="{{ Request::is('redintegradadesalud/videoconferencias') ? 'active' : '' }}"><a href="{{url('redintegradadesalud/videoconferencias')}}">Videoconferencias</a></li>
        <li class="{{ Request::is('redintegradadesalud/jornadas_cientificas') ? 'active' : '' }}"><a href="{{url('redintegradadesalud/jornadas_cientificas')}}">Jornadas Científicas</a></li>
        <li class="{{ Request::is('apross_avedian/info') ? 'active' : '' }}"><a href="{{url('apross_avedian/info')}}">Curso Apross-Avedian</a></li>
    </ul>
</li>
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Servicios <span class="caret"></span></a>
    <ul class="dropdown-menu" role="menu">
        <li class="{{ Request::is('solicitudes/*') ? 'active' : '' }}"><a href="{{url('solicitudes/solicitud')}}">Solicitudes</a></li>
        <li class="{{ Request::is('solicitudesElementos/*') ? 'active' : '' }}"><a href="{{url('solicitudes_elementos/solicitud/elementos')}}">Solicitudes de Elementos</a></li>
        <li><a href="http://sgic.hospital-italiano.org.ar" target="_blank">SGIC - Biblioteca Digital</a></li>
        <li class="{{ Request::is('capacitacion/*') ? 'active' : '' }}"><a href="{{url('capacitacion/instructivos')}}">Instructivos</a></li>
        <li class="{{ Request::is('salas/*') ? 'active' : '' }}"><a href="{{url('salas/aula_docencia')}}">Aulas y Salas</a></li>
        <li class="{{ Request::is('sistemas/*') ? 'active' : '' }}"><a href="{{url('sistemas/mesa_ayuda')}}">Sistemas</a></li>
        <li class="{{ Request::is('telefonia/*') ? 'active' : '' }}"><a href="{{url('telefonia/telefonos')}}">Telefonía</a></li>
        <li><a href="http://facturas.hospital-italiano.org.ar/" target="_blank">Facturas WEB</a></li>
        <!--<li class="{{ Request::is('bioingenieria/*') ? 'active' : '' }}"><a href="{{url('bioingenieria/solicitud')}}">Bioingenieria</a></li>-->
        <li class="{{ Request::is('gastronomia/*') ? 'active' : '' }}"><a href="{{url('gastronomia/menu_semana_comedor')}}">Cocina y Bar</a></li>
        <!--<li class="{{ Request::is('comunicaciones/*') ? 'active' : '' }}"><a href="{{url('comunicaciones/solicitud')}}">Comunicaciones</a></li>-->
        <!--<li class="{{ Request::is('mantenimiento/*') ? 'active' : '' }}"><a href="{{url('mantenimiento/solicitud')}}">Mantenimiento</a></li>-->
        <!--<li class="{{ Request::is('conforthospitalario/*') ? 'active' : '' }}"><a href="{{url('conforthospitalario/solicitud')}}">Confort Hospitalario</a></li>-->
    </ul>
</li>
<li><a href="{{url('webapp')}}" target="_self" style="color:lemonchiffon;"><i class="fa fa-fw fa-th-large"></i><strong>Gestión</strong></a></li>
@endif