<?php
$cliente = "Luis Cabrera Benito";
$remitente = "Luis Cabrera Benito";
$web = "https://parzibyte.me/blog";
$mensajePie = "Gracias por su compra";
$fecha = date("Y-m-d");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="./bs3.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Comprobante de pago</title>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-10 ">
            <h2>OILMOTORS Y & C</h2>
        </div>
        <div class="col-xs-2">
            <img class="img img-responsive" src="" alt="Logotipo">
        </div>
    </div>
    <hr>
    <div class="row text-start" style="margin-bottom: 2rem;">
        <div class="col-xs-6">
            <h4 style="display:inline;">Cliente: </h4><?php foreach ($dato_D as $dato_Ds) { echo $dato_Ds->Nombre; } ?>
        </div>
    </div>
    <div id="fecha_div" class="row">
        <div class="col-xs-2 text-center">
            <strong>Fecha</strong>
            <br>
            <?php echo $fecha ?>
            <br>
            <strong>Factura No. <?php foreach ($dato_D as $dato_Ds) { echo $dato_Ds->Factura; } ?></strong>
            <br>
        </div>
    </div>
    <style>
        #fecha_div{
            position: relative; left: 290px; top: 0px;

        }
    </style>
    <hr>
    <div class="row">
        <div class="col-xs-12">
            <table class="table table-condensed table-bordered table-striped">
                <thead>
                <tr>
                    <th>Producto/Servicio</th>
                    <th>Cantidad</th>
                    <th>Sub-total</th>
                    <th>Iva</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($dato as $datos) {  ?>
                        <tr>
                            <td><?php echo $datos->pro_o_ser; ?></td>
                            <td><?php echo $datos->Cantidad;  ?></td>
                            <td><?php echo $datos->Sub_Total; ?></td>
                            <td><?php echo $datos->Iva; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="3" class="text-right">
                        <h4>Total</h4></td>
                    <td>
                        <h4>$ <?php foreach ($dato_D as $dato_Ds) { echo $dato_Ds->Total; } ?></h4>
                    </td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 text-start">
            <p class="h5"><?php echo $mensajePie ?></p>
        </div>
    </div>
</div>

</body>
</html>
