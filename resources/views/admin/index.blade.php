@extends('adminlte::page')

@section('title', '| Menu')
    <link rel="icon" href="https://cdn.discordapp.com/attachments/881318396128526336/921091428321488946/unknown.png">
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
                <i class="ion ion-bag"></i>
            </div>
                 <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                <i class="ion ion-stats-bars"></i>
            </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
            <i class="ion ion-person-add"></i>
        </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
