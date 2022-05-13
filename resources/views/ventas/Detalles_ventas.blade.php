@extends('adminlte::page')

@section('title', '| Detalles')

@section('css')
    <link rel="icon" href="\vendor\adminlte\dist\img\Moto.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
                <form action="{{ route('volver') }}" method="get">
                @csrf
                    <div class="text-center">
                    <button id="volver" type="submit" name="volver" value="volver" class="btn btn-success">Volver</button>
                    </div>

            </form>
            </div>
        </div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection
