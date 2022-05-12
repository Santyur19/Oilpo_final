@extends('adminlte::page')

@section('title', '| Menu')
    <link rel="icon" href="https://cdn.discordapp.com/attachments/881318396128526336/921091428321488946/unknown.png">
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
    <div class="card" id="card">
        <div class="card-body" >
                <div class="row mb-3">

                    <div class="col-md-12">
                    <h1 id="texto" class="text-center" >Bienvenido {{ Auth::user()->name }}</h1>
                    </div>
                </div>
        </div>
    </div>
<!-- Tarjetas -->

    <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                    <h3>@php  use App\Models\Proveedore; 
                    echo Proveedore::count();
                    @endphp
                    </h3>
                    <p>Proveedores</p>
            </div>
            <div class="icon">
                <i class="ion ion-person"></i>
            </div>
            </div>
     </div>


     <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>@php  use App\Models\Producto; 
                    echo Producto::count();
                    @endphp</h3>
                    <p>Productos</p>
                </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>@php  use App\Models\Cliente; 
                    echo Cliente::count();
                    @endphp</h3>
                <p>Clientes</p>
            </div>
        <div class="icon">
            <i class="ion ion-person-stalker"></i>
        </div>
        </div>
    </div>  

    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
                <div class="inner">
                    <h3>@php  use App\Models\Servicio; 
                    echo Servicio::count();
                    @endphp</h3>
                    <p>Servicios</p>
                </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
