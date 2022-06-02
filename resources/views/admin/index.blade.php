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
