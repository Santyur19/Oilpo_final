@extends('adminlte::page')

@section('title', '| Detalles')

@section('css')
    <link rel="icon" href="https://cdn.discordapp.com/attachments/881318396128526336/921091428321488946/unknown.png">
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
                            <h5>Numero factura  <?php echo $_POST['Numero_factura']; ?></h5>
                            <br>
                            <span id="card_title">
                                <h3>Detalles</h3>
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio compra</th>
                                        <th>Fecha de compra</th>
                                        <th>Foto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($detalles as $detalle){ ?>
                                    <tr>
                                        <td><?php echo $detalle->Producto ?></td>
                                        <td><?php echo $detalle->Cantidad ?></td>
                                        <td><?php echo $detalle->Precio_compra ?></td>
                                        <td><?php echo $detalle->Fecha_compra ?></td>
                                        <td><img  class="img-thumbnail" src="/img/detalles_compras/<?php echo $detalle->Foto ?>" alt="A" width="200"></td>
                                    </tr>
                                </tbody>
                                <?php } ?>

                            </table>
                            <h5>Total compra $<?php echo $Total ?></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection
