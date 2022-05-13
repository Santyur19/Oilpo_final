<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>OILPO</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link  >
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Koulen&family=Oleo+Script+Swash+Caps:wght@700&family=Tapestry&display=swap" rel="stylesheet">

    {{--ICONO  --}}
    <link rel="icon" href="\vendor\adminlte\dist\img\Moto.png">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    {{-- Iconos inputs --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body >
    
    <div>
        <nav id="nav" class="navbar navbar-expand-md navbar-dark">
            <div class="container">
                    <?php if(Request::is('password/reset')){ ?>
                        <a href="/login" style="text-decoration: none;">
                            <img id="img" src="\vendor\adminlte\dist\img\Moto_oilpo.png" alt="moto.png"><span id="oilpo">ILPO</span>
                        </a>
                    <?php }else{ ?>
                        <a href="login" style="text-decoration: none;">
                            <img id="img" src="vendor\adminlte\dist\img\Moto_oilpo.png" alt="moto.png"><span id="oilpo">ILPO</span>
                        </a>
                    <?php } ?>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Request::is('register'))
                                <li class="nav-item">
                                    <a style="color:black;" class="btn btn-primary" href="{{ route('login') }}"><h5 style="font-family: Comic Sans MS; ">{{ __('Iniciar sesión') }}</h5></a>
                                </li>
                            @endif

                            @if (Request::is('login'))
                                <li class="nav-item">
                                    &nbsp;&nbsp;&nbsp;<a style="color:black;" class="btn btn-primary" href="{{ route('register') }}" ><h5 style="font-family: Comic Sans MS; ">{{ __('Registrarse') }}</h5></a>
                                </li>
                            @endif

                            @if (Request::is('password/reset'))
                                <li class="nav-item">
                                    <a style="color:black;" class="btn btn-primary" href="{{ route('login') }}"><h5 style="font-family: Comic Sans MS; ">{{ __('Iniciar sesión') }}</h5></a>
                                </li>

                                <li class="nav-item">
                                    &nbsp;&nbsp;&nbsp;<a style="color:black;" class="btn btn-primary" href="{{ route('register') }}" ><h5 style="font-family: Comic Sans MS; ">{{ __('Registrarse') }}</h5></a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <style>
        #img{
            width:25% ;




        }
        #oilpo{
            position: absolute; top: 37px;
            /* position: relative; */
            color:#675d65;
            font-family:Fantasy;
            font-size:50px;
            -webkit-text-stroke: 3px black;

        }
        #OILMOTORS{
            width: 30%;

        }




    </style>
    <?php if(Request::is('password/reset')){ ?>
        <div class="position-absolute bottom-0 start-0">
            <img src="/vendor/adminlte/dist/img/OILMOTORS.png" id="OILMOTORS">
        </div>
    <?php }else{ ?>
        <div class="position-absolute bottom-0 start-0">
            <img src="vendor/adminlte/dist/img/OILMOTORS.png" id="OILMOTORS">
        </div>
    <?php } ?>

</body>


</html>

