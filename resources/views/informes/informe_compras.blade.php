<body onload="inicio();"></body>

@extends('adminlte::page')

@section('title', '| Informes')

@section('css')
    <link rel="icon" href="\vendor\adminlte\dist\img\Moto.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
                        <a href="/informes" type="button" class="btn btn-info">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0v-2z"/>
                                <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                            </svg>
                            Volver
                        </a>
                        <h1 class="text-center">Informes compras</h1>
                        <canvas id="line_chart" width="400" height="190"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>

    <script>
        var cData = JSON.parse(`<?php echo $data;  ?>`)
        var div_line_chart = document.getElementById("line_chart");
        var myLineChart = new Chart(div_line_chart, {
            type: 'bar',
            data: {
                labels:cData.label_año,
                //labels: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul"],
                datasets: [
                    {
                        label: "Compras",
                        fill: false,
                        lineTension: 0.1,
                        backgroundColor: "#428bca",
                        borderColor: "#357ebd",
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        pointBorderColor: "#3276B1",
                        pointBackgroundColor: "#3276B1",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: "#3276B1",
                        pointHoverBorderColor: "#3276B1",
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        data:cData.data,
                        //data: [65, 59, 80, 81, 56, 55, 40],
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
            }
        });
    </script>
<script>
        function inicio(){

            <?php

                $role=auth()->user()->roles[0]->id;
                $Permiso_consulta=DB::Select("SELECT permission_id as permiso FROM role_has_permissions WHERE role_id = $role");



                foreach ($Permiso_consulta as $permisos){

                    $Permiso_inicial[]= array ("permiso" => $permisos->permiso);
                }
                $roles=Json_encode($Permiso_inicial);

                echo "var Array=".$roles."";
            ?>

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
@endsection
