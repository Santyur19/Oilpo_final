@extends('adminlte::page')

@section('title', '| Menu')
    <link rel="icon" href="https://cdn.discordapp.com/attachments/881318396128526336/921091428321488946/unknown.png">
@section('content_header')
@stop

@section('content')
    <style>

        .content-wrapper {
            background: #ADA996;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #eaeaea56, #dbdbdb86, #f2f2f25d, #ada99660);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #eaeaea5d, #dbdbdb5b, #f2f2f260, #ada99650); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

            background-size: 100%;
            background-position: 0px -47px;
            background-repeat: no-repeat;


        }
        #card{
            border-radius: 10px;
            border: 7px;
            border-bottom: black;
            background: #ADA996;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #eaeaea80, #dbdbdb8c, #f2f2f28c, #ada99688);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #eaeaea83, #dbdbdb79, #f2f2f27c, #ada99675); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            -webkit-box-shadow: -34px 21px 50px 22px rgba(0,0,0,0.91);
            -moz-box-shadow: -34px 21px 50px 22px rgba(0,0,0,0.91);
            box-shadow: -34px 21px 50px 22px rgba(0,0,0,0.91);
        }
        #texto{
            text-shadow: -1px -1px 1px #aaa,0px 4px 1px rgba(0,0,0,0.5),4px 4px 5px rgba(0,0,0,0.7),0px 0px 7px rgba(0,0,0,0.4);
            letter-spacing: 1px;
            word-spacing: 2px;
            font-family: fantasy;
            font-size: 30px;
        }
    </style>
    <br>

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
