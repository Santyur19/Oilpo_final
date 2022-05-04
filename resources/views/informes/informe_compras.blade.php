@extends('adminlte::page')

@section('title', '| Informes')

@section('css')
    <link rel="icon" href="https://cdn.discordapp.com/attachments/881318396128526336/921091428321488946/unknown.png">
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
            type: 'line',
            data: {
                labels:cData.label,
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

@endsection
