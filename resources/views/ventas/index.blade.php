<body onload="inicio();"></body>

@extends('adminlte::page')

@section('title', '| Gestión Compras')

@section('css')
    <link rel="icon" href="\vendor\adminlte\dist\img\Moto.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
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
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <br>
                            <span id="card_title">
                                <h3>Gestión Ventas</h3>
                            </span>
                            @can('Agregar_venta')
                            <form action="{{ route('Agregar_venta') }}" method="post">
                                @csrf
                                <button class="btn btn-success" type="submit">Agregar
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus-circle-dotted" viewBox="0 0 16 16">
                                        <path d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0zM6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458L4.46.824zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66zm1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8zM.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752zm-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                                    </svg>
                                </button>
                            </form>
                            @endcan
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive ">

                            <table id="table" class="table table-striped table-hover display nowrap">
                                <thead class="thead">
                                    <tr>
                                        <th>#Factura</th>
                                        <th>Cliente</th>
                                        <th>Fecha de venta</th>
                                        <th>Total</th>
                                        <th>Acciones</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($venta as $ventas){ ?>
                                        <tr>
                                            <td>{{ $ventas->Factura }}</td>
                                            <td>{{ $ventas->Nombre }}</td>
                                            <td>{{ $ventas->Fecha_venta }}</td>
                                            <td>{{ $ventas->Total }}</td>
                                            <td>
                                                @can('Detalles_ventas')
                                                <form action="{{ route('Detalles_ventas') }}" method="POST">
                                                    @csrf
                                                    <input hidden name="Factura" type="number" value="<?php echo $ventas->Factura  ?>">

                                                    <button type="submit" class="btn btn-info">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                                        </svg>
                                                        Detalles
                                                    </button>
                                                </form>
                                                @endcan
                                            </td>
                                            <td>
                                                @can('Editar_estado_ventas')

                                                    <form class="boton" action="{{ route('Editar_estado_ventas') }}" method="POST">
                                                        @csrf @method('PUT')
                                                        <?php if($ventas->estado=="Activo") { ?>
                                                            <button class="btn btn-success" type="submit" ><?php echo $ventas->estado ?>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                                                                    <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                                                                    <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                                                                </svg>
                                                            </button>
                                                        <?php }else{ ?>
                                                            <button onclick="Inactivo()" type="button" class="btn btn-secondary"><?php echo $ventas->estado ?></button>
                                                        <?php } ?>
                                                    </form>
                                                @endcan
                                            </td>
                                    <?php } ?>

                                        </tr>
                                </tbody>
                                    @yield('js')
                                    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                                    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
                                    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
                                    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

                                    <script>
                                        $('#table').DataTable({"language": {"url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"}});
                                        $(document).ready(function(){
                                            let table = $('#table').DataTable();
                                        });


                                    </script>
                                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
                            </table>
                        </div>
                        <br>
                        <div class="text-center" >
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Fecha">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-file-earmark-spreadsheet" viewBox="0 0 16 16">
                                    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V9H3V2a1 1 0 0 1 1-1h5.5v2zM3 12v-2h2v2H3zm0 1h2v2H4a1 1 0 0 1-1-1v-1zm3 2v-2h3v2H6zm4 0v-2h3v1a1 1 0 0 1-1 1h-2zm3-3h-3v-2h3v2zm-7 0v-2h3v2H6z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- MODAL  EXPORTAR  -->
    <div class="modal fade" id="Fecha" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Filtrado de descarga</h5>
                @can('Exportar')
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                @endcan
            </div>

                @csrf
                <div class="modal-body">
                <div class="Text-center">
                <form action="{{ route('Exportar')}}" method="post">
                    @csrf
                    <div class="text-center" >
                        <input type="text" hidden name="Desicion" value="Todo">
                        <button type="submit" class="btn btn-secondary" >Descargar todo</button>
                    </div>
                </form>

                <form action="{{ route('Exportar')}}" method="post">
                    @csrf
                    <label for="">Fecha Mínima</label>
                    <br>
                    <input type="date" class="form-control" required name="Fecha_minima" id="Fecha_minima" min="<?php echo $Fecha_minima ?>" >
                    <br>
                    <label for="">Fecha Máxima</label>
                    <br>
                    <input type="date" class="form-control" required name="Fecha_maxima" id="Fecha_maxima" max="<?php echo $Fecha_maxima ?>" >

                    <input type="text" hidden name="Desicion" value="Filtrar">
                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-danger" href="ventas">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                </div>
                </div>
            </form>
        </div>
    </div>
<!------------------------------------------------------------------------------------------------------------------------------------------------  -->

<script>
$('.boton').submit(function(e){
    e.preventDefault();
    Swal.fire({
        title: '¿Está seguro de inhabilitar la venta?',
        text: "No podrás revertir esto.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonText: 'Cancelar',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Sí, bórralo!'
        }).then((result) => {
        if (result.isConfirmed) {
            this.submit();
        }
    })

})
</script>

    <script>
        function Inactivo(){
            Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'La venta fue inhabilitada, no se puede activar de nuevo!',
            })
        }

    </script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php if($message = Session::get('success')){ ?>
            <script>
            Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'GUARDADO CON EXITO!',
                showConfirmButton: false,
                timer: 1500
            })
            </script>
    <?php } ?>

    <?php if($message = Session::get('Error')){ ?>
        <p>{{$message}}</p>
        <script>
        Swal.fire({
            position: 'top-center',
            icon: 'error',
            title: 'Ha faltado ingresar el cliente',
            showConfirmButton: false,
            timer: 1500
        })

        </script>
    <?php } ?>

    <?php if($message = Session::get('inhabilitado')){ ?>
        <p>{{$message}}</p>
        <script>
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'Se ha inhabilitado la venta con exito',
            showConfirmButton: false,
            timer: 1500
        })

        </script>
    <?php } ?>

    <?php if($message = Session::get('stock')){ ?>
        <p>{{$message}}</p>
        <script>

        Swal.fire({
            position: 'top-center',
            icon: 'error',
            title: 'No hay suficiente stock!',
            showConfirmButton: false,
            timer: 1500
        })

        </script>
    <?php } ?>
    <?php if($message = Session::get('Vacio')){ ?>
        <p>{{$message}}</p>
        <script>

        Swal.fire({
            position: 'top-center',
            icon: 'warning',
            title: 'No hay datos para descargar!',
            showConfirmButton: false,
            timer: 1500
        })

        </script>
    <?php } ?>

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

@endsection
