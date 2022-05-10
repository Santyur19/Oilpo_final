@extends('layouts.app')

@section('content')
<br>
<br>
<style>
    .container{

    }
    .card{
        height: 370px;
        width: 40%;
        position: center;
        background-color: #e6e6fab6;
        border-radius: 5px;
        border-color:rgba(114, 114, 114, 0.774);
        display: block;

    }
    #password_request{
        text-align: end;
    }

    body{
        font-family:Georgia, 'Times New Roman', Times, serif;
        background-position: center center;
        background-attachment: fixed;
        background-color: #66999;
        background-size: cover;
        background-image: url('vendor/adminlte/dist/img/Fondo_login.png');
        background-repeat: no-repeat;
    }

    #email::placeholder{
        font-family: "Font Awesome 6 Free";
    }

    #password::placeholder{
        font: var(--fa-font-solid);
        content: "\f007";
    }

    #sesion{
        height: 66px;
        font-size: 20px;
    }
</style>
<div class="container">
    <div class="card">
        <form method="POST" action="{{ route('login') }}" >
            <div class="card-header"><h3 class="text-center" id="login">Iniciar sesión</h3></div>
            <div class="card-body">
                @csrf
                <div class="mb-4">
                    <br>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }} " required autocomplete="email" autofocus placeholder=" Correo">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-4">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder=" Contrasena">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-12 form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="exampleCheck1">Recuérdame</label>
                </div>
                <div id="password_request">
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('¿Olvidaste tu contraseña?') }}
                        </a>
                    @endif
                </div>
            </div>
            <div class="card-footer-fluid">
                <button id="sesion" type="submit" class="btn btn-primary form-control">
                    Iniciar sesión
                    &nbsp;
                    <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                        <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                    </svg>

                </button>
            </div>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection
