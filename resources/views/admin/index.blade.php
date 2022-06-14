<body onload="inicio();"></body>

@extends('adminlte::page')

@section('title', '| Menu')
    <link rel="icon" href="\vendor\adminlte\dist\img\Moto.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css?v=3.2.0">
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
@section('content_header')
@stop

@section('content')

<br>
<body onload="inicio();"></body>
<div class="card">
    <div class="card-header">
        <h1 id="texto" class="text-center" >Bienvenido {{ Auth::user()->name }}</h1>
    </div>
    <div class="card-body">

        <!-- Tarjetas -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                    <a id="link_proveedores" href="proveedores" style="text-decoration: none; color:white">
                        <h3 >@php  use App\Models\Proveedore;
                        echo Proveedore::count();
                        @endphp
                        </h3>
                        <p>Proveedores</p>
                    </a>
                </div>
                <div class="icon">
                    <i class="ion ion-person"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <a id="link_productos" href="productos" style="text-decoration: none; color:white">
                        <h3>@php  use App\Models\Producto;
                        echo Producto::count();
                        @endphp</h3>
                        <p>Productos</p>
                    </a>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <a id="link_clientes" href="clientes" style="text-decoration: none; color:white">

                        <h3>@php  use App\Models\Cliente;
                            echo Cliente::count();
                            @endphp</h3>
                        <p>Clientes</p>
                    </a>
                </div>
                <div class="icon">
                    <i class="ion ion-person-stalker"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <a id="link_servicios" href="servicios" style="text-decoration: none; color:white">

                        <h3>@php  use App\Models\Servicio;
                        echo Servicio::count();
                        @endphp</h3>
                        <p>Servicios</p>
                    </a>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
            </div>
        </div>
    </div>
  </div>
  <div class="contenedor">
        <button class="botonF1">
        <span>
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
        </svg>
        </span>
        </button>
        <button class="btn botonF2">
        <span>+</span>
        </button>
        <button class="btn botonF3">
        <span>+</span>
        </button>
        <button class="btn botonF4">
        <span>+</span>
        </button>
        <button class="btn botonF5">
        <span>
        
        </span>
        </button>
    </div>
    <style>
        *{
            margin:0;
            }
            header{
            height:170px;
            color:#FFF;
            font-size:20px;
            font-family:Sans-serif;
            background:#009688;
            padding-top:30px;
            padding-left:50px;
            }
            .contenedor{
            width:90px;
            height:240px;
            position:absolute;
            right:0px;
            bottom:-670px;
            }
            .botonF1{
            width:60px;
            height:60px;
            border-radius:100%;
            background:#F44336;
            right:0;
            bottom:0;
            position:absolute;
            margin-right:16px;
            margin-bottom:16px;
            border:none;
            outline:none;
            color:#FFF;
            font-size:36px;
            box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
            transition:.3s;  
            }
            span{
            transition:.5s;  
            }
            .botonF1:hover span{
            transform:rotate(360deg);
            }
            .botonF1:active{
            transform:scale(1.1);
            }
            .btn{
            width:40px;
            height:40px;
            border-radius:100%;
            border:none;
            color:#FFF;
            box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
            font-size:28px;
            outline:none;
            position:absolute;
            right:0;
            bottom:0;
            margin-right:26px;
            transform:scale(0);
            }
            .botonF2{
            background:#2196F3;
            margin-bottom:85px;
            transition:0.5s;
            }
            .botonF3{
            background:#673AB7;
            margin-bottom:130px;
            transition:0.7s;
            }
            .botonF4{
            background:#009688;
            margin-bottom:175px;
            transition:0.9s;
            }
            .botonF5{
            background:#FF5722;
            margin-bottom:220px;
            transition:0.99s;
            }
            .animacionVer{
            transform:scale(1);
            }

    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
        $('.botonF1').hover(function(){
        $('.btn').addClass('animacionVer');
        })
        $('.contenedor').mouseleave(function(){
        $('.btn').removeClass('animacionVer');
        })
    </script>
  <script>
    function inicio(){
        var Array = eval (<?php echo $rol; ?>);
        let contador_ventas = 0;
        let contador_compras = 0;

        $('#menu').hide();
        $('#roles').hide();
        $('#servicios').hide();
        $('#clientes').hide();
        $('#usuarios').hide();
        $('#productos').hide();
        $('#G_compras').hide();
        $('#G_ventas').hide();
        $('#informes').hide();
        $('#permisos').hide();
        $('#proveedores').hide();

        //links
        $('#link_proveedores').removeAttr('href');
        $('#link_productos').removeAttr('href');
        $('#link_clientes').removeAttr('href');
        $('#link_servicios').removeAttr('href');

        for (var i = 0; i < Array.length; i++){
            var permisos = Array[i].permiso;
            
            switch (permisos){

                case 1:
                    $('#menu').show();
                    break;
                case 2:
                    $('#roles').show();
                    break;
                case 9:
                    $('#servicios').show();
                    contador_ventas++;
                    break;
                case 12:
                    $('#clientes').show();
                    contador_ventas++;
                    break;
                case 16:
                    $('#proveedores').show();
                    contador_compras++;
                    break;
                case 20:
                    $('#usuarios').show();
                    break;
                case 26:
                    $('#productos').show();
                    contador_compras++;
                    break;
                case 30:
                    $('#G_compras').show();
                    contador_compras++;
                    break;
                case 37:
                    $('#G_ventas').show();
                    contador_ventas++;
                    break;
                case 45:
                    $('#informes').show();
                    break;
                case 47:
                    $('#permisos').show();
                    break;
            }
        }

        if (contador_ventas == 0){
            $('#ventas').hide();

        }
        if (contador_compras == 0){
            $('#compras').hide();

        }
    }

  </script>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
