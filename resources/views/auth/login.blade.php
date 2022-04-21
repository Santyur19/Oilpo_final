@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center" id="borde">
        <div class="col-md-8">

            <div class="card" id="card">
                <div class="card-header"><h3>{{ __('Inicio de sesión') }}</h3></div>
                <br>
                </br>
                <div class="card-body" >
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-center"><h4>{{ __('E-Mail') }}</h4></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        </br>
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-right"><h4>{{ __('Contraseña') }}</h4></label>
                            <div id="password" class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-11 ">
                                <input style="font-size: 25px;" class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    <h4>{{ __('Recuérdame') }}</h4>
                                </label>
                            </div>
                        </div>
                        <br>
                        <div class="row mb-3">
                            <div class="col-md-6 ">
                                <div class="col-md-6 offset-md-8">
                                    <button type="submit" class="btn btn-primary">
                                        <h5>{{ __('Iniciar sesión') }}</h5>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                    @if (Route::has('password.request'))
                                    &nbsp;&nbsp;&nbsp;<a class="btn btn-link" href="{{ route('password.request') }}">
                                            <h5>{{ __('¿Has olvidado tu contraseña?') }}</h5>
                                        </a>
                                    @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection
