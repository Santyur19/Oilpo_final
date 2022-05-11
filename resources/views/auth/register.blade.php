@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" >
            <div class="card">
                <div class="card-header"><h3 class="text-center">Registro</h3></div>
            <form method="POST" action="{{ route('register') }}">
                <div class="card-body" >
                    @csrf
                    <div class="mb-4">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="  Nombre">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="  E-mail">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="  Password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="  Confirmar Password">
                    </div>
                </div>
                <div class="card-footer-fluid">
                    <button type="submit" class="btn btn-primary form-control" id="Registrarse">
                       Registrarse
                    &nbsp;
                    <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16">
                        <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                        <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                    </svg>                    </button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
<style>
    body{
        font-family:Georgia, 'Times New Roman', Times, serif;
        background-position: center center;
        background-attachment: fixed;
        background-color: #66999;
        background-size: cover;
        background-image: url('vendor/adminlte/dist/img/Fondo_login.png');
        background-repeat: no-repeat;
    }
    .card{
        height: 383px;
        width: 62%;
        position: center;
        background-color: #e6e6fab6;
        border-radius: 5px;
        border-color:rgba(114, 114, 114, 0.774);
        display: block;
    }
    #Registrarse{
        height: 60px;
        font-size: 20px;
    }
    ::placeholder{
        font: var(--fa-font-solid);
        content: "\f007";
    }
</style>
@endsection
