@extends('adminlte::page')

@section('title', '| Agregar compra')

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

<div class="row">
    <div class="col-md-12">
    <form action="{{ route('Guardar_compra') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                        <div class="form-group">
                        <label for="">Numero de compras</label>
                        <input type="number" name="Numero_compras" id="">
                        <br>
                        <label for="">Proveedor</label>
                        <select style="width: 100%" class="js-example-theme-single" name="Nombre_proveedor" id="">
                            <option>Seleccione</option>
                            <?php foreach($proveedores as  $proveedor){ ?>
                            <option value="<?php echo $proveedor->id ?>"><?php echo $proveedor->Nombre_proveedor ?></option>
                            <?php } ?>
                        </select>
                        </div>

                        <label for="">Numero de factura</label>
                        <input type="number" class="form-control" name="Numero_factura" id="" aria-describedby="helpId" placeholder="">
                        <small id="helpId" class="form-text text-muted"></small>

                        <label for="">Fecha de compra</label>
                        <input type="date" class="form-control" name="Fecha_compra" id="" aria-describedby="helpId" placeholder="">
                        <small id="helpId" class="form-text text-muted"></small>

                        <label for="">Foto</label>
                            <input type="file" class="form-control" name="Foto" id="Foto" aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <label for="">Nombre Producto</label>
                            <select style="width: 100%" class="js-example-theme-single" name="Productos" id="Productos">
                                <option>Seleccione</option>
                                <?php foreach($productos as  $producto){ ?>
                                <option value="<?php echo $producto->Nombre_Producto ?>"><?php echo $producto->Nombre_Producto ?></option>
                                <?php } ?>
                            </select>
                            <br></br>
                            <label for="">Precio compra</label>
                            <input type="number" class="form-control" name="Precios_compra" id="Precios_compra" aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted"></small>

                            <label for="">Precio venta</label>
                            <input type="number" class="form-control" name="Precios_venta" id="Precios_venta" aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted"></small>

                            <label for="">Cantidad</label>
                            <input type="number" class="form-control" name="Cantidades" id="Cantidades" aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted"></small>
                            <br>
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
                                <th>Precio compra</th>
                                <th>Precio venta</th>
                                <th>Sub total</th>
                                <th>Acciones</th>
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
            <button id="cancelar" type="button" onclick="cancelar()" class="btn btn-danger">Cancelar</button>
        </div>

    </form>


    </div>
</div>
@yield('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- SELECT 2   --}}

<script>
    $(document).ready(function() {
        $('.js-example-theme-single').select2({
            width: 'resolve',
            theme: "classic"
        });
    });
</script>

<script>
        $(document).ready(function(){
            $('#agregar').click(function(){
                agregar();

            });
            $('#cancelar').click(function(){
                cancelar();

            });


        });
        var cont = 0;
        total = 0;
        subtotal=[];
        $('#guardar').hide();
        $('#cancelar').hide();
        function agregar(){
            // producto = $('#Productos').val();
            var producto = $("#Productos option:selected").text();
            precio_compra = $('#Precios_compra').val();
            precio_venta = $('#Precios_venta').val();
            cantidad = $('#Cantidades').val();

            if(producto !="" && cantidad >0 && precio_compra>0){
                subtotal[cont]=(cantidad*precio_compra);
                total = total+subtotal[cont];

                var fila = '<tr id="fila'+cont+'"><td><input type="text" name="Producto[]" value="'+producto+'"></td><td><input type="number" name="Cantidad[]" value="'+cantidad+'"></td><td><input type="number" name="Precio_compra[]" value="'+precio_compra+'"></td><td><input type="number" name="Precio_venta[]" value="'+precio_venta+'"></td><td>'+subtotal[cont]+'</td><td><button class="btn btn-danger" onclick="eliminar('+cont+');" >X</button></td></tr>';
                cont++;
                limpiar();
                $('#total').html('<h1 class="btn btn-info">Total: $'+total+'<input type="number" hidden name="Total" value="'+total+'"  ></h1>');
                evaluar();
                $('#tabla').append(fila);

            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                    footer: '<a href="">Why do I have this issue?</a>'
                })
            }
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
                $('#cancelar').show();
            }else{
                $('#guardar').hide();
                $('#cancelar').hide();

            }

        }
        function eliminar(index){
            total=total-subtotal[index];
            $('#total').html('<h1 class="btn btn-info">Total: $'+total+'</h1>');
            $('#fila'+index).remove();
            guardar();
        }

        function cancelar(){
            location.reload();
        }



</script>

<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>




@endsection
