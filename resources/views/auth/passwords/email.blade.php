@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h4 class="text-center">Restablecer contraseña</h4></div>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="card-body">
                    <div class="mb-4">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="  E-mail">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-4">
                    <button id="Enviar" type="submit" class="btn btn-primary form-control">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                            <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
                        </svg>
                        Enviar enlace de restablecimiento

                    </button>
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
        background-image: url('/vendor/adminlte/dist/img/Fondo_login.png');
        background-repeat: no-repeat;
    }
    .card{
        height: 200px;
        width: 60%;
        position: center;
        background-color: #e6e6fab6;
        border-radius: 5px;
        border-color:rgba(114, 114, 114, 0.774);
        display: block;
    }
    #Enviar{
        height: 60px;
        font-size: 20px;
    }
    ::placeholder{
        font: var(--fa-font-solid);
        content: "\f007";

    }

</style>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if ($message = Session::get('status'))
<script>
    Swal.fire({
        html: '<h3>Hemos enviado un correo electrónico con el enlace de restauración</h3>',
        imageUrl: 'https://c.tenor.com/-a5MFIkPtfIAAAAC/correo-email.gif',
        imageWidth: 300,
        imageHeight: 200,
        imageAlt: 'Custom image',
        timer: 9000,
    })
</script>
@endif
@endsection
