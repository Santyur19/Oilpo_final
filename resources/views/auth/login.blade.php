@extends('layouts.app')

@section('content')
<br>
<br>
<div class="container">
    <div class="card">
        <div class="card-header"><h3 class="text-center">Login</h3></div>
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}" >
                @csrf
                <div class="mb-4">
                    <br>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }} " required autocomplete="email" autofocus placeholder="Correo">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-4">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Contraseña">
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
            </form>
        </div>

            <button id="sesion" type="submit" class="btn btn-primary">
                Iniciar sesión
            </button>

      </div>
</div>

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
    #sesion{
        width: 445px;
        height: 65px;


    }
    body{
        background-size:100%;
        background-image: url('https://yacaremotos.shop/assets/img/portfolio/carousel/1.png');
        background-repeat: no-repeat;
    }

</style>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection
