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
            var rol = eval (<?php echo $rol; ?>);
            var nombre= rol[0].name;
            console.log(nombre);

            if (nombre=="Empleado"){

                $('#usuarios').hide();
                $('#Roles').hide();
                $('#Permisos').hide();
                $('#Compras').hide();
                $('#Informes').hide();

                //links
                $('#link_proveedores').removeAttr('href');
                $('#link_productos').removeAttr('href');
                $('#link_clientes').removeAttr('href');
                $('#link_servicios').removeAttr('href');

            }
        }

  </script>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
