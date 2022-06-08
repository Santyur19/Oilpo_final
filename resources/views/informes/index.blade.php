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
                        <h2 class="text-center">Informes
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-bar-chart" viewBox="0 0 16 16">
                                <path d="M4 11H2v3h2v-3zm5-4H7v7h2V7zm5-5v12h-2V2h2zm-2-1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1h-2zM6 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm-5 4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3z"/>
                            </svg>
                        </h2>
                    </div>
                    <br>
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6">
                              <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Informes ventas</h5>
                                </div>
                                <div class="card-body">
                                    <canvas id="myChart" width="400" height="190"></canvas>
                                    <br>
                                    <form action="{{ route('Informe_ventas') }}" method="POST">
                                        @csrf
                                        <button class="btn btn-primary" type="submit">Informes Ventas</button>
                                    </form>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Informes compras</h5>
                                </div>
                                <div class="card-body">
                                    <canvas id="line_chart" width="400" height="190"></canvas>
                                    <br>
                                    <form action="{{ route('Informe_compras') }}" method="POST">
                                        @csrf
                                        <button class="btn btn-primary" type="submit">Informes Compras</button>
                                    </form>
                                </div>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>

{{-- INFORMES VENTAS --}}
    <script>
        $(document).ready(function(){
            var cData = JSON.parse(`<?php echo $data;  ?>`)
            const ctx = document.getElementById('myChart').getContext('2d');
            console.log(cData)

    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels:cData.label_año,
            //labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],

            datasets: [{
                label: 'Ventas',
                data:cData.data,
                backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1



            }]

        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

        });
    </script>

{{-- INFORMES COMPRAS --}}
<script>
     var cData = JSON.parse(`<?php echo $data_compras;  ?>`)
        var div_line_chart = document.getElementById("line_chart");
        var myLineChart = new Chart(div_line_chart, {
            type: 'line',
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
                        data:cData.data_compras,
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
