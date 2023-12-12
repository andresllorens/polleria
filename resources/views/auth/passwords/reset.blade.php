@extends('layouts.web.template')

@section('content')

<div class="login-box">
    <div class="login-logo">
        <a href="{{ url('/') }}"><b>Intranet </b>HI</a>
    </div>

    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Restablecer su contraseña</p>

        <form method="post" action="{{ url('/password/reset') }}">
            {!! csrf_field() !!}

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email Particular">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if ($errors->has('email'))
                    <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}" id="content_password">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}" id="content_password_confirmation">
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm password" autocomplete="off">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <span class="help-block message_copy_confirmation">* Ambas contraseñas deben coincidir</span>
                <!-- <span class="help-block">Su contraseña es válida</span> -->
                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>

            <div class="row">
                <div id="message" class="col-md-12">
                    <h5>Su password debe contener:</h5>
                    <ul> 
                        <li id="letter" class="text-danger">Al menos una letra <b>minúscula</b>.</li>
                        <li id="capital" class="text-danger">Al menos una letra <b>mayúscula</b>.</li>
                        <li id="symbol" class="text-danger">Al menos un <b>caracter especial (!$#%.-*?_...)</b>.</li>
                        <li id="number" class="text-danger">Un <b>número</b>.</li>
                        <li id="length" class="text-danger">Mínimo <b>7 caracteres</b>.</li>   
                    </ul>
                </div>
            </div>

            <div class="row">
                <div id="message_confirmation" class="col-md-12">
                    
                </div>
            </div>

            <div class="row text-center">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" id="btn-restablecer">
                        <i class="fa fa-btn fa-refresh"></i> Restablecer la contraseña
                    </button>
                </div>
            </div>
        </form>

    </div>
</div>

@endsection

@section('scripts')
<script>
document.addEventListener("DOMContentLoaded", function(event) {
    document.getElementById("message").style.display = "none";
    document.getElementById("message_confirmation").style.display = "none";
    document.getElementById("btn-restablecer").disabled = true;
});

var myInput = document.getElementById("password");
var myInputCopy = document.getElementById("password_confirmation");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");
var symbol = document.getElementById("symbol");

var password_valid;

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

myInputCopy.onfocus = function() {
    document.getElementById("message_confirmation").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

myInputCopy.onblur = function() {
    document.getElementById("message_confirmation").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  let letterLowerStatus;
  let letterCapitalStatus;
  let numberStatus;
  let lengthStatus;
  let symbolStatus;

  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {
    letter.classList.remove("text-danger");
    letter.classList.add("text-success");
    letterLowerStatus = true;
  } else {
    letter.classList.remove("text-success");
    letter.classList.add("text-danger");
    letterLowerStatus = false;
  }

  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {
    capital.classList.remove("text-danger");
    capital.classList.add("text-success");
    letterCapitalStatus = true;
  } else {
    capital.classList.remove("text-success");
    capital.classList.add("text-danger");
    letterCapitalStatus = false;
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {
    number.classList.remove("text-danger");
    number.classList.add("text-success");
    numberStatus = true;
  } else {
    number.classList.remove("text-success");
    number.classList.add("text-danger");
    numberStatus = false;
  }

  // Validate length
  if(myInput.value.length >= 7) {
    length.classList.remove("text-danger");
    length.classList.add("text-success");
    lengthStatus = true;
  } else {
    length.classList.remove("text-success");
    length.classList.add("text-danger");
    lengthStatus = false;
  }

 // Validate Symbol
 var symbols = /[!$#%\.\@\-\*\?\_]/g;
 if(myInput.value.match(symbols)) {
    symbol.classList.remove("text-danger");
    symbol.classList.add("text-success");
    symbolStatus = true;
  } else {
    symbol.classList.remove("text-success");
    symbol.classList.add("text-danger");
    symbolStatus = false;
  }

  if(symbolStatus && lengthStatus && numberStatus && letterCapitalStatus && letterLowerStatus){
    password_valid = true;
    document.getElementById("content_password").classList.add("has-success");
    document.getElementById("content_password").classList.remove("has-error");
  }else{
    password_valid = false;
    document.getElementById("content_password").classList.add("has-error");
    document.getElementById("content_password").classList.remove("has-success");
  }
}

myInputCopy.onkeyup = function() {
    let password_confirmation_valid;

    if(myInput.value === myInputCopy.value && password_valid){
        document.getElementById("btn-restablecer").disabled = false;
        document.getElementById("message_confirmation").style.display = "none";
        document.getElementById("content_password_confirmation").classList.add("has-success");
        document.getElementById("content_password_confirmation").classList.remove("has-error");
    }else{
        document.getElementById("btn-restablecer").disabled = true;
        document.getElementById("content_password_confirmation").classList.add("has-error");
        document.getElementById("content_password_confirmation").classList.remove("has-success");
        document.getElementById("message_confirmation").style.display = "block";
    }
}

</script>
@endsection