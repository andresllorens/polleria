@extends('layouts.web.template')

@section('content')

<div class="login-box">
    <div class="login-logo">
        <a href="{{ url('/') }}"><b>Intranet </b>HI</a>
    </div>

    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Introduzca su usuario para restablecer la contraseña</p>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="post" action="{{ url('/password/email') }}">
            {!! csrf_field() !!}

            <div class="form-group has-feedback {{ $errors->has('user') ? ' has-error' : '' }}">
                <input type="text" class="form-control" name="user" value="{{ old('user') }}" placeholder="Usuario">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @if ($errors->has('user'))
                    <span class="help-block">
                    <strong>{{ $errors->first('user') }}</strong>
                </span>
                @endif
            </div>

            <div class="row" style="margin-top: 10px">
                <div class="col-md-12">
                    <div class="alert alert-info">
                        Se le enviará un <b>correo electrónico</b>:
                        <ul>
                            <li>A la casilla que ha declarado como <b>email particular</b>.</li>
                            <li>Revisar tanto la <b>bandeja de entrada</b> como la bandeja de <b>spam</b>.</li>
                        </ul>
                    </div>
                </div>
            <div>

            <div class="row text-center">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-envelope"></i> Enviar E-mail
                    </button>
                </div>
            </div>
        </form>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection