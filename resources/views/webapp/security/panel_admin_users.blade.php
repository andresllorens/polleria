@extends('layouts.app.template')

@section('encabezado')

    Gestión de Usuarios
    <small>CRUD</small>

@endsection


@section('content')


        <div class="box box-primary box-gris">

            <div class="box-header">

                <div class="margin" id="botones_control">
                    <a href="{{ url("webapp/security/form_new_user") }}" class="btn btn-xs btn-primary">Agregar Usuario</a>
                    <a href="{{ url("webapp/security/panel_admin_users") }}"  class="btn btn-xs btn-primary" >Listado Usuarios</a>
                </div>

                <div class="margin">
                    <form   action="{{ url('webapp/security/search_user') }}"  method="post"  >
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" id="dato_buscado" name="dato_buscado" required>
                            <span class="input-group-btn">
					<input type="submit" class="btn btn-primary" value="Buscar" >
					</span>

                        </div>

                    </form>
                </div>

            </div>

            <div class="margin box-body box-white">

                <div class="table-responsive" >

                    <table  class="table table-hover table-striped" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Rol</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>AD</th>
                            <th>Acción</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($usuarios as $usuario)
                        <tr role="row" class="odd">
                            <td>{{ $usuario->id }}</td>
                            <td><span class="label label-default">
                                    |
                                    @foreach($usuario->getRolesNames() as $role)
                                        {{  $role . " | " }}
                                    @endforeach

                                </span>
                            </td>
                            <td class="mailbox-messages mailbox-name"><a href="{{url('webapp/security/form_edit_user&' . $usuario->id)}}"  style="display:block"><i class="fa fa-user"></i>&nbsp;&nbsp;{{ $usuario->name  }}</a></td>
                            <td>{{ $usuario->email }}</td>
                            <td>@if( $usuario->ldap == true)<i class="fa fa-fw fa-check"></i>@endif</td>
                            <td>
                                <a class="btn  btn-default btn-xs" href="{{url('webapp/security/form_edit_user&' . $usuario->id)}}"><i class="fa fa-fw fa-edit"></i></a>

                                <button id='borrar' type="button"  class="btn  btn-danger btn-xs" data-toggle="modal" data-target="#modal-windows" onclick="delete_user('{{ $usuario->name }}','{{url('webapp/security/delete_user&' . $usuario->id)}}')"><i class="fa fa-fw fa-remove"></i></button>
                            </td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div>
            </div>

            <div class="text-center">
                {{ $usuarios->links() }}
            </div>

        </div>

@endsection

@section('scripts')
    <script>

        function delete_user(name,url) {
            $('#modal-windows').addClass('modal-warning');
            $('#modal-title').html("Borrar Usuario");
            $('#modal-message').html("Esta seguro que quiere borrar el usuario " + name +"?. Esta acción no borrará el usuario del AD.");
            $('#modal-btn-left-close').html("Cancelar");
            $('#modal-btn-left-close').removeClass('oculto');
            $('#modal-btn-right-accion1').attr("href", url);
            $('#modal-btn-right-accion1').html("Aceptar");
            $('#modal-btn-right-accion1').removeClass('oculto');
        }


    </script>
@endsection
