@extends('adminlte::page')

@section('title', '| Agregar Venta')

@section('css')
    <link rel="icon" href="https://cdn.discordapp.com/attachments/881318396128526336/921091428321488946/unknown.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@endsection
@section('template_title')

@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
        <!-- <form action="{{ route('Buscar_clientes') }}" method="POST">
        @csrf



                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Seleccion del cliente</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <label for="">Cliente</label>
                        <?php //foreach($clientes as  $cliente){ ?>
                        <input name="Nombre" value="<?php //echo $cliente->Nombre ?>"><?php //echo $cliente->Nombre ?>
                        <?php //} ?>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Seleccionar</button>
                    </div>
                    </div>
                </div>
                </div>


                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Seleccionar cliente
                                    </button>
            </form> -->
            <form action="{{ route('Guardar_Venta') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                    <select class="form-select" name="Nombre">
                                        <option value=" ">Seleccione</option>
                                        <?php foreach($clientes as  $cliente){ ?>
                                        <option value="<?php echo $cliente->Nombre ?>"><?php echo $cliente->Nombre ?></option>
                                        <?php } ?>
                                    </select>  

                                        <br>
                                        <label for="">Fecha de compra</label>
                                        <input type="datetime" class="form-control" name="Fecha_compra" id="" aria-describedby="helpId" readonly value="<?php echo $fecha_actual?>">
                                        <small id="helpId" class="form-text text-muted"></small>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <label for="">Producto</label>
                                        <select class="form-select" name="Nombre_producto" id="producto">
                                            <option selected >Seleccione</option>
                                                <?php  foreach($productos as  $producto){ ?>
                                            <option selected value="<?php echo $producto->Nombre_producto ?>"><?php echo $producto->Nombre_Producto ?></option>
                                            <?php } ?>
                                        </select>

                                        <label for="">Cantidad</label>
                                        <input type="number" class="form-control" name="Cantidades" id="cantidad" aria-describedby="helpId" placeholder="">
                                        <small id="helpId" class="form-text text-muted"></small>

                                        <label for="">Precio</label>
                                        <input type="number" class="form-control" name="precio" id="precio" aria-describedby="helpId" placeholder="">
                                        <small id="helpId" class="form-text text-muted"></small> 

                                        <label for="">Iva</label>
                                        <input type="number" class="form-control" name="iva" id="iva" aria-describedby="helpId" placeholder="">
                                        <small id="helpId" class="form-text text-muted"></small> 
                                        <div class="text-center" >
                                        <button  id="agregar" type="button" class="btn btn-primary">Agregar producto</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-1-12">
                            <div class="card">
                                <div class="card-body">
                                    <p id="total"></p>
                                    <table id="tabla" class="table">
                                        <thead>

                                        <tr>
                                            <th>Producto</th>
                                            <th>Cantidad</th>
                                            <th>Precio</th>
                                            <th>Iva</th>
                                            <th>Total</th>
                                        </tr>

                                        </thead>


                                        <tbody>


                                        </tbody>


                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="text-center">
                    <button id="guardar" type="submit" class="btn btn-primary">Agregar</button>
                </div>

            </form>
        </div>
    </div>
    @yield('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    
    <script>
        $(document).ready(function(){
            $('#agregar').click(function(){
                agregar();

            });

        });
        var cont = 0;
        var total = 0;
        var iva =0;
        var ivat=0;
        subtotal=[];
        $('#guardar').hide();
        function agregar(){
            var producto = $('#producto').val();
            var cantidad = $('#cantidad').val();
            var iva = $('#iva').val();
            var precio = $('#precio').val();

            var producto = $("#prodcuto option:selected").val();


            producto= $(this).children("option:selected").val();

            if(producto !="" && cantidad >0 && iva>0){
                subtotal[cont]=(cantidad*precio);
                ivat=ivat+(subtotal*(iva/100));
                total = (subtotal+ivat);


                var fila = '<tr id="fila'+cont+'"><td><input readnoly type="text" name="producto[]" value="'+producto+'"></td><td><input readnoly type="number" name="Cantidad[]" value="'+cantidad+'"></td><td><input readnoly type="number" name="precio[]" value="'+precio+'"></td><td><input readnoly type="number" name="iva[]" value="'+iva+'"></td><td>'+total+'</td><td><button class="btn btn-danger" onclick="eliminar('+cont+');" >X</button></td></tr>';
                cont++;
                limpiar();
                $('#total').html('<h1 class="btn btn-info">Total: $'+total+'<input type="number" name="Total" value="'+total+'"  ></h1>');
                evaluar();
                $('#tabla').append(fila);
            }

            // }else{
            //     Swal.fire({
            //         icon: 'error',
            //         title: 'Oops...',
            //         text: 'Something went wrong!',
            //         footer: '<a href="">Why do I have this issue?</a>'
            //     })
            // }
        }
        function limpiar(){
            $('#Productos').val('');
            $('#Precios_compra').val('');
            $('#Precios_venta').val('');
            $('#Cantidades').val('');
        }
        function evaluar(){
            if (total>0){
                $('#guardar').show();
            }else{
                $('#guardar').hide();

            }

        }
        function eliminar(index){
            total=total-subtotal[index];
            $('#total').html('<h1 class="btn btn-info">Total: $'+total+'</h1>');
            $('#fila'+index).remove();
            guardar();
        }

    </script>

    <!-- <script>
    jQuery(document).on('submit', '#form_insert', function(event){
        event.preventDefault();
        jQuery.ajax({
            url:'{{ url("") }}',
            type: 'POST',
            dataType: 'json',
            data: $(this).serialize(),

        })
        .done(function(repuesta){
            console.log(repuesta);
            if(!respuesta.error){
                alert('Los datos se ingresaron');

            }else{
                alert('No se puede ingresar los datos');


            }
        })
        .fail(function(resp){
            console.log(resp.responseText);
        })
        .always(function(){
            console.log('TODO CORRECTO');
        })

    });
</script> -->
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>




@endsection