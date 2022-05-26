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
                                <h5>Numero factura  <?php echo $total-> Factura ?></h5>
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
                                        <th>#Factura</th>
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
                        </div>
                    </div>
                </div>
                {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Comprobante</button> --}}
                {{-- MODAL COMPROBANTE DE PAGO --}}
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h3>Comprobante</h3>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php foreach ($ventas as $venta){ ?>

                                            <td>{{ $venta->Nombre_Producto }}</td>
                                            <td>{{ $venta->Cantidad }}</td>
                                        <?php } ?>
                                    </tr>
                                </tbody>
                            </table>

                            <table class="table">
                                <thead>
                                    <tr>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Total: </th><td>$ 46467477474</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <form action="{{ route('PDF') }}" method="get">
                                @csrf
                                <button type="submit" class="btn btn-primary">Exportar</button>
                            </form>
                        </div>
                      </div>
                    </div>
                  </div>
                {{-- END COMROBANTE DE PAGO --}}
                <div class="text-center">
                    <a type="button" class="btn btn-info" href="/ventas">
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
        function inicio(){
            var rol = eval (<?php echo $rol; ?>);
            var nombre= rol[0].name;

            if (nombre=="Empleado"){

                $('#usuarios').hide();
                $('#Roles').hide();
                $('#Permisos').hide();
                $('#Compras').hide();
                $('#Informes').hide();
            }
        }

  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

@endsection
