<body onload="inicio();"></body>

@extends('adminlte::page')

@section('title', '| Detalles')

@section('css')
    <link rel="icon" href="\vendor\adminlte\dist\img\Moto.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
@endsection
@section('template_title')

@endsection



@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <br>
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <?php foreach ($totales as $total){ ?>
                                <h5>Numero Comprobante  <?php echo $total-> Factura ?></h5>
                            <?php } ?>
                                <br>
                            <span id="card_title">
                                <h3>Detalles ventas</h3>
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#Comprobante</th>
                                        <th>Nombre</th>
                                        <th>Producto</th>
                                        <th>Servicio</th>
                                        <th>Fecha Venta</th>
                                        <th>cantidad</th>
                                        <th>Iva</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php foreach ($ventas as $venta){ ?>
                                    <tr>
                                        <td>{{ $venta->Factura }}</td>
                                        <td>{{ $venta->Nombre }}</td>
                                        <td>{{ $venta->Nombre_Producto }}</td>
                                        <td>{{ $venta->Nombre_servicio }}</td>
                                        <td>{{ $venta->Fecha_venta }}</td>
                                        <td>{{ $venta->Cantidad }}</td>
                                        <td>{{ $venta->Iva }}</td>
                                    </tr>

                                <?php }?>

                            </table>

                            <?php foreach ($totales as $total){ ?>
                                <h5>Total Venta $<?php echo $total->Total ?></h5>
                            <?php }?>
                            <div class="text-end">
                                <button style="background-color: rgb(9, 161, 9);" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-receipt-cutoff" viewBox="0 0 16 16">
                                        <path d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zM11.5 4a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z"/>
                                        <path d="M2.354.646a.5.5 0 0 0-.801.13l-.5 1A.5.5 0 0 0 1 2v13H.5a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1H15V2a.5.5 0 0 0-.053-.224l-.5-1a.5.5 0 0 0-.8-.13L13 1.293l-.646-.647a.5.5 0 0 0-.708 0L11 1.293l-.646-.647a.5.5 0 0 0-.708 0L9 1.293 8.354.646a.5.5 0 0 0-.708 0L7 1.293 6.354.646a.5.5 0 0 0-.708 0L5 1.293 4.354.646a.5.5 0 0 0-.708 0L3 1.293 2.354.646zm-.217 1.198.51.51a.5.5 0 0 0 .707 0L4 1.707l.646.647a.5.5 0 0 0 .708 0L6 1.707l.646.647a.5.5 0 0 0 .708 0L8 1.707l.646.647a.5.5 0 0 0 .708 0L10 1.707l.646.647a.5.5 0 0 0 .708 0L12 1.707l.646.647a.5.5 0 0 0 .708 0l.509-.51.137.274V15H2V2.118l.137-.274z"/>
                                    </svg>
                                   Comprobante
                                </button>
                            </div>
                            {{-- MODAL COMPROBANTE DE PAGO --}}
                            <div  class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Comprobante de pago</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <div class="card">
                                        <div class="card-body">
                                            <div>
                                                <div class="row">
                                                    <div class="col-xs-10 ">
                                                        <h2>OILMOTORS Y & C</h2>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row text-start" style="margin-bottom: 2rem;">
                                                    <div class="col-xs-6">
                                                        <h3 class="h2">Cliente: </h3>
                                                        <strong>{{ $venta->Nombre  }}</strong>
                                                    </div>
                                                </div>
                                                <div id="fecha_div" class="row">
                                                    <div class="col-xs-2 text-center">
                                                        <strong>Fecha</strong>
                                                        <br>
                                                        <?php  $fecha = date("Y-m-d");  echo $fecha; ?>
                                                        <br>
                                                        <strong>Comprobante No. {{ $venta->Factura }}</strong>
                                                        <br>

                                                    </div>
                                                </div>
                                                <br>
                                                <style>
                                                    #fecha_div{
                                                        position: relative; left: 150px; top: 0px;

                                                    }
                                                    #comprobante{
                                                        width: 100%;
                                                    }

                                                </style>
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <table id="comprobante" class="table table-condensed table-bordered table-striped">
                                                            <thead>
                                                            <tr>
                                                                <th>Producto/Servicio</th>
                                                                <th>Cantidad</th>
                                                                <th>Sub-total</th>
                                                                <th>Iva</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach($comprobante as $comprobantes){  ?>
                                                                    <tr>
                                                                        <td>{{ $comprobantes->pro_o_ser }}</td>
                                                                        <td>{{ $comprobantes->Cantidad }}</td>
                                                                        <td>$ {{$comprobantes->Sub_Total }}</td>
                                                                        <td>{{ $comprobantes->Iva }}</td>
                                                                    </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                            <tfoot>
                                                            <tr>
                                                                <td colspan="3" class="text-right">
                                                                    <h4>Total</h4></td>
                                                                <td>
                                                                    <h4>$ {{ $venta->Total }}</h4>
                                                                </td>
                                                            </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-12 text-start">
                                                        <p class="h5"></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                                        <form action="{{ route('PDF') }}" method="POST">
                                            <input hidden value="{{ $venta->Factura }}" name="Num_Factura">
                                            <input hidden value="{{ $venta->id }}" name="id">

                                            @csrf
                                            <button type="submit" class="btn btn-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z"/>
                                                </svg>
                                                Exportar
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                            {{-- END COMROBANTE DE PAGO --}}
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <a id="volver" type="button" class="btn btn-info" href="/ventas">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0v-2z"/>
                            <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                        </svg>

                        Volver
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

@endsection
