@extends('layouts.app')

@section('content')+
<style>
    body{
        background-image: url('vendor/adminlte/dist/img/Fondo.jpg');
        background-repeat: repeat;
        background-size: 110%;
    }
    #card{
        text-align: center;
        color:white;
        background-repeat: no-repeat;
        background-size: 250px;
        background-color: rgba(78, 77, 77, 0.397);
        -webkit-box-shadow: -22px 28px 20px 16px rgba(0,0,0,0.75);
        -moz-box-shadow: -22px 28px 20px 16px rgba(0,0,0,0.75);
        box-shadow: -22px 28px 20px 16px rgba(0,0,0,0.75);
        background-position: 490px 20px;
        border-block-color: blue;
    }

</style>
<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-8" >
            <div class="card" id="card" >
                <div class="card-header">{{ __('Registro') }}</div>

                <div class="card-body" >
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <h5 for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</h5>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <h5 for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</h5>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <h5 for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</h5>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <h5 for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar contraseña') }}</h5>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrarse') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection