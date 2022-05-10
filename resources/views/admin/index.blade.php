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


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
