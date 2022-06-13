
@extends('adminlte::page')

@section('title', '| Agregar Venta')

@section('css')
    <link rel="icon" href="\vendor\adminlte\dist\img\Moto.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('plugins/Chosen/chosen.css') }}">

@endsection
@section('template_title')

@endsection

@section('content')
<body onload="inicio_esconder(); inicio()"></body>

    <div class="row" >
        <div class="col-md-12">
            <form action="{{ route('Guardar_Venta') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <label for="">Cliente <small style="color:red;">*</small></label>
                                    <select style="width: 100%" class="chosen-select" name="Nombre" id="Nombre_cliente" required>
                                        <option value=" ">Seleccione</option>
                                        <?php foreach($clientes as  $cliente){ ?>
                                        <option value="<?php echo $cliente->Nombre ?>"><?php echo $cliente->Nombre ?></option>
                                        <?php } ?>
                                    </select> </p>
                                        <label for="">Fecha de Venta</label>
                                        <input type="date" class="form-control" name="Fecha_venta" id="" aria-describedby="helpId" readonly value="<?php echo $fecha_actual; ?>">
                                        <small id="helpId" class="form-text text-muted"></small>

                                        <label for="">Factura</label>
                                        <input type="text" class="form-control" name="factura" id="" aria-describedby="helpId" readonly value="<?php foreach($Facturas as  $Factura) {echo $Factura->Factura+1;} ?>">
                                        <small id="helpId" class="form-text text-muted"></small>
                                        <br>
                                        <div class="text-center">
                                            <button type="button" class="btn btn-primary" id="Producto" value="Producto"> Producto</button>
                                            <button type="button" class="btn btn-primary" id="Servicio" value="Servicio" > Servicio</button>
                                            <input type="text" hidden value="" id="Validar">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div  class="col-md-6" id="estorbo">
                                <div class="card">
                                    <div class="card-body">
                                        <label id="productol">Producto <small style="color:red;">*</small></label>
                                        <select class="form-select"  name="Nombre_producto" id="producto" >
                                            <option value=" ">Seleccione</option>
                                                <?php  foreach($productos as  $producto){ ?>
                                                    <option value="<?php echo $producto->id ?>"><?php echo $producto->Nombre_Producto ?></option>
                                                <?php } ?>
                                        </select>

                                        <label id="lable_Precio_producto">Precio Producto</label>
                                        <input readonly type="number" class="form-control" id="Precio_producto" aria-describedby="helpId" placeholder="">
                                        <small id="helpId" class="form-text text-muted"></small>

                                        <!--
                                        <label for="">Precio producto</label>
                                        <input type="number" hidden class="form-control" name="precio" id="precio" aria-describedby="helpId" placeholder="">
                                        <small id="helpId" class="form-text text-muted"></small>  -->

                                        <label id="cantidadl">Cantidad <small style="color:red;">*</small></label>
                                        <input type="number" class="form-control" name="Cantidades" id="cantidad" aria-describedby="helpId" placeholder="">
                                        <small id="helpId" class="form-text text-muted"></small>

                                        <label id="ival">Iva <small style="color:red;">*</small></label>
                                        <input type="number" class="form-control" name="ivas" id="iva" aria-describedby="helpId" placeholder="" >
                                        <small id="helpId" class="form-text text-muted"></small>

                                        <label id="serviciol">Servicio <small style="color:red;">*</small></label>
                                        <select class="form-select" name="Nombre_servicio" id="servicio">
                                            <option value=" ">Seleccione</option>
                                                <?php  foreach($servicios as $servicio){ ?>
                                                    <option value="<?php echo $servicio->Nombre_servicio ?>"><?php echo $servicio->Nombre_servicio ?></option>>
                                                <?php } ?>
                                        </select>

                                        <label id="preciol">Precio servicio <small style="color:red;">*</small></label>
                                        <input type="number" class="form-control" name="precio" id="precio" aria-describedby="helpId" placeholder="">
                                        <small id="helpId" class="form-text text-muted"></small>


                                        <div class="text-center" >
                                        <br>
                                        <button  id="agregar_producto" type="button" class="btn btn-primary">Agregar producto</button>
                                        <button  id="agregar_servicio" type="button" class="btn btn-primary">Agregar servicio</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div id="table" class="table-responsive">

                            <p id="total"></p>
                                <table id="tabla" class="table">
                                    <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Servicio</th>
                                        <th>Cantidad</th>
                                        <th>Precio servicio</th>
                                        <th>Precio productos</th>
                                        <th>Iva</th>
                                        <th>Subtotal</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button id="guardar" type="submit" class="btn btn-primary">Agregar</button>
                    <button id="cancelar" type="button" onclick="cancelar()" class="btn btn-danger">Cancelar</button>
            </form>
            <br>
            <br>
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
    @yield('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script>
        document.getElementById('producto').addEventListener('change', function() {

            if (this.value == " "){
                $('#Precio_producto').hide();
                $('#lable_Precio_producto').hide();
            }else{

                var Array = eval (<?php echo $precio; ?>)

                $('#Precio_producto').show();
                $('#lable_Precio_producto').show();
                $('#Precio_producto').val(Array[this.value-1].Precio_producto);
            }
        });
    </script>
    <script>
        function inicio_esconder(){
            $('#agregar_servicio').hide();
            $('#agregar_producto').hide();

            $('#table').hide();

            $('#Precio_producto').hide();
            $('#lable_Precio_producto').hide();

            $('#producto').hide();
            $('#cantidad').hide();
            $('#servicio').hide();
            $('#precio').hide();

            $('#productol').hide();
            $('#ival').hide();
            $('#iva').hide();
            $('#cantidadl').hide();
            $('#serviciol').hide();
            $('#preciol').hide();

            $('#estorbo').hide();

        }
    </script>
    <script>
            $(document).ready(function(){
            $('#Producto').click(function(){
                $('#estorbo').show();

                $('#agregar_servicio').hide();
                $('#agregar_producto').show();

                $('#Validar').val('Producto');
                Producto();
                limpiar();

            });
        });

            $(document).ready(function(){
            $('#Servicio').click(function(){
                $('#estorbo').show();

                $('#agregar_servicio').show();
                $('#agregar_producto').hide();

                $('#Validar').val('Servicio');
                Servicio();
                limpiar();

            });
        });

    </script>
    <script>
        function Producto(){
            $('#Validar').val('Producto');
            $('#producto').show();
            $('#cantidad').show();
            $('#iva').show();
            $('#servicio').hide();
            $('#precio').hide();


        }
        function Servicio(){

            $('#servicio').show();
            $('#precio').show();
            $('#producto').hide();
            $('#productol').hide();
            $('#cantidad').hide();
            $('#iva').hide();
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#Nombre_cliente').select2();
        });

    </script>
    <script>
        $(document).ready(function(){
            $('#agregar_producto').click(function(){
                agregar();

            });
            $('#agregar_servicio').click(function(){
                agregar();

            });
            $('#cancelar').click(function(){
                cancelar();

            });

        });
        var cont = 0;
        var total = 0;
        var iva =0;
        var ivat=0;
        subtotal=[];
        totalt=[];
        $('#guardar').hide();
        $('#cancelar').hide();
        function agregar(){
            $('#table').show();

            var cantidad = $('#cantidad').val();
            var iva = $('#iva').val();
            var precios = $('#precio').val();
            console.log(precios)

            if (precios != ""){var precio = parseInt(precios);} else{precio = "";}

            var validar = $('#Validar').val();



            //var producto = $("#producto option:selected").val();
            var producto_id = $("#producto option:selected").val();
            var producto = $("#producto option:selected").text();
            var servicio = $("#servicio option:selected").val();
            // var Cliente = $("#Nombre_cliente option:selected").text();
            if (servicio == undefined){servicio="";}
            // if (producto == "Seleccione" or producto == "undefined"){producto="";}
            console.log(validar);
            console.log(producto)
            console.log(cantidad)
            console.log(iva)
            console.log(precios)
            console.log(servicio)

            if (validar == "Servicio"){

                if (precio < 0 || precio == "" || servicio == " " || servicio == "" ) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'No se han llenado todos campos!',

                    })
                    if (total == 0){
                        $('#table').hide();

                    }
                }
                else{
                    subtotal[cont]=precio;
                    totalt[cont]=subtotal[cont];
                    total = total + subtotal[cont];

                    var fila = '<tr id="fila'+cont+'"><td><input class="input-group-text" type="text" name="producto[]" value="" readonly><td><input class="input-group-text" type="text" name="servicio[]" value="'+servicio+'" readonly></td></td><td><input class="input-group-text" type="number" name="Cantidad[]" value="" readonly></td><td><input class="input-group-text" type="number" name="precio[]" value="'+precio+'" readonly></td><td><input class="input-group-text" type="number" name="precio[]" value="'+precio_producto+'" readonly></td><td><input class="input-group-text" type="number" name="iva[]" value="" readonly></td><td><input class="input-group-text" value="'+subtotal[cont]+'" name="subtotal[]"></td><td><button class="btn btn-danger" onclick="eliminar('+cont+');" >X</button></td></tr>';

                }
            }
            else if (validar == "Producto"){

                if (cantidad == "" || cantidad == "0" || iva == "" || producto =="" || producto =="Seleccione") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'No se han llenado todos campos!',

                    })
                    if (total == 0){
                        $('#table').hide();

                    }
                }
                else{
                    var Array = eval (<?php echo $precio; ?>)
                    var precio_producto = Array[producto_id-1].Precio_producto;

                    subtotal[cont]=(cantidad*precio_producto);
                    ivat=ivat+(precio_producto*(iva/100));
                    totalt[cont]=(subtotal[cont]+ivat);
                    total = total + totalt[cont];


                    ivat=0;

                    var fila = '<tr id="fila'+cont+'"><td><input class="input-group-text" type="text" name="producto[]" value="'+producto+'" readonly></td><td><input class="input-group-text" type="text" name="servicio[]" value=" " readonly></td><td><input class="input-group-text" type="number" name="Cantidad[]" value="'+cantidad+'" readonly></td><td><input class="input-group-text" type="number" name="precio[]" value="" readonly></td><td><input class="input-group-text" type="number" name="precio[]" value="'+precio_producto+'" readonly></td><td><input class="input-group-text" type="number" name="iva[]" value="'+iva+'" readonly></td><td><input class="input-group-text" value="'+subtotal[cont]+'"" name="subtotal[]" readonly></td><td><button class="btn btn-danger" onclick="eliminar('+cont+');" >X</button></td></tr>';

                }

            }
            cont++;
            limpiar();
            $('#total').html('<h1 class="btn btn-info">Total: $'+total.toFixed(0)+'<input type="number" hidden name="Total" value="'+total+'"  ></h1>');
            evaluar();
            $('#tabla').append(fila);

        }
        function limpiar(){
            $('#Precio_producto').hide();
            $('#lable_Precio_producto').hide();

            $('#producto').val('');
            $('#cantidad').val('');
            $('#precio').val('');
            $('#iva').val('');
            $('#servicio').val('');
        }
        function evaluar(){
            if (total>0){
                $('#guardar').show();
                $('#cancelar').show();
                $('#volver').hide();
            }else{
                $('#guardar').hide();
                $('#cancelar').hide();
                $('#volver').show();


            }

        }
        function eliminar(index){
            total=total-totalt[index];
            if (total <= 0){
                $('#table').hide();
                $('#guardar').hide();
                $('#cancelar').hide();
                $('#volver').show();
            }
            $('#total').html('<h1 class="btn btn-info">Total: $'+total+'</h1>');
            $('#fila'+index).remove();

            guardar();
        }
        function cancelar(){
            location.reload();
        }
        // function volver(){
        //     history.back();
        // }
        function Producto(){
            $('#lista').show();
            $('#producto').show();
            $('#cantidad').show();
            $('#iva').show();
            $('#servicio').hide();
            $('#precio').hide();

            $('#productol').show();
            $('#ival').show();
            $('#cantidadl').show();

            $('#serviciol').hide();
            $('#preciol').hide();
        }
        function Servicio(){

            $('#lista').show();
            $('#producto').hide();
            $('#cantidad').hide();
            $('#iva').hide();
            $('#servicio').show();
            $('#precio').show();

            $('#productol').hide();
            $('#ival').hide();
            $('#cantidadl').hide();

            $('#serviciol').show();
            $('#preciol').show();


        }

        </script>
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

    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="{{ asset('plugins/Chosen/chosen.jquery.js') }}"></script>
    <script>
        $(".chosen-select").chosen();
    </script>
@endsection

