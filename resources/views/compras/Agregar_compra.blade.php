@extends('adminlte::page')

@section('title', '| Agregar compra')

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
                                <div class="mb-3">
                                    <input type="number" hidden name="Numero_compras" id="" value="<?php foreach($numero_facturas as $numero_factura){ echo $numero_factura->Numero_compras+1; } ?>">
                                    <label for="">Proveedor <small style="color:red;">*</small></label>
                                    <select  style="width: 100%" class="js-example-theme-single" name="Nombre_proveedor" id="">
                                        <option value="">Seleccione</option>
                                        <?php foreach($proveedores as  $proveedor){ ?>
                                        <option value="<?php echo $proveedor->id ?>"><?php echo $proveedor->Nombre_proveedor ?></option>
                                        <?php } ?>
                                    </select>
                                    <small class="text-danger">{{$errors->first('Nombre_proveedor')}}</small>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="">Numero de factura <small style="color:red;">*</small></label>
                                <input type="number" class="form-control" name="Numero_factura" id="" aria-describedby="helpId" placeholder="" value="{{ old('Numero_factura') }}">
                                <small class="text-danger">{{$errors->first('Numero_factura')}}</small>
                            </div>
                            <div class="mb-3">
                                <label for="">Fecha de compra <small style="color:red;">*</small></label>
                                <input type="date" class="form-control" name="Fecha_compra" id="" aria-describedby="helpId" placeholder="" value="{{ old('Fecha_compra') }}">
                                <small class="text-danger">{{$errors->first('Fecha_compra')}}</small>
                            </div>
                            <div class="mb-3">
                                <label for="">Foto <small style="color:red;">*</small></label>
                                <input type="file" class="form-control" name="Foto" id="Foto" aria-describedby="helpId" placeholder="">
                                <small class="text-danger">{{$errors->first('Foto')}}</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <label for="">Nombre Producto <small style="color:red;">*</small></label>
                            <select style="width: 100%" class="js-example-theme-single" name="Producto" id="Producto">
                                <option value="">Seleccione</option>
                                <?php foreach($productos as  $producto){ ?>
                                <option value="<?php echo $producto->Nombre_Producto ?>"><?php echo $producto->Nombre_Producto ?></option>
                                <?php } ?>
                            </select>
                            <br></br>
                            <label for="">Precio compra <small style="color:red;">*</small></label>
                            <input type="number" class="form-control" id="Precio_compra" aria-describedby="helpId" placeholder="">
                            <small style="color:red;"><p id="Precio_error"> </p></small>

                            <label for="">Precio venta <small style="color:red;">*</small></label>
                            <input type="number" class="form-control" id="Precio_venta" aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted"></small>

                            <label for="">Cantidad <small style="color:red;">*</small></label>
                            <input type="number" class="form-control" id="Cantidad" aria-describedby="helpId" placeholder="">
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
            @can('Guardar_compra')
            <button id="guardar" type="submit" class="btn btn-primary">Agregar</button>
            @endcan
            <button id="cancelar" type="button" onclick="cancelar()" class="btn btn-danger">Cancelar</button>

        </div>

    </form>
    <form action="{{ route('volver_compra') }}" method="get">
        @csrf
            <div class="text-center" >
            <button id="volver" type="submit" name="volver" value="volver" class="btn btn-danger">Volver</button>
            </div>

    </form>


    </div>
</div>
@yield('js')

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
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
        $('#volver').click(function(){
                volver();

        });

        });
        var cont = 0;
        total = 0;
        subtotal=[];
        $('#guardar').hide();
        $('#cancelar').hide();
        function agregar(){
            // producto = $('#Productos').val();
            var producto = $("#Producto option:selected").text();
            precio_compra = $('#Precio_compra').val();
            precio_venta = $('#Precio_venta').val();
            cantidad = $('#Cantidad').val();

            if(producto !="" && cantidad > 0 && precio_compra > 0 && precio_venta > 0){
                subtotal[cont]=(cantidad*precio_compra);
                total = total+subtotal[cont];

                var fila = '<tr id="fila'+cont+'"><td><input  type="text" name="Productos[]" value="'+producto+'"></td><td><input type="number" name="Cantidades[]" value="'+cantidad+'"></td><td><input type="number" name="Precios_compra[]" value="'+precio_compra+'"></td><td><input type="number" name="Precios_venta[]" value="'+precio_venta+'"></td><td>'+subtotal[cont]+'</td><td><button class="btn btn-danger" onclick="eliminar('+cont+');" >X</button></td></tr>';
                cont++;
                limpiar();
                $('#total').html('<h1 class="btn btn-info">Total: $'+total+'<input type="number" hidden name="Total" value="'+total+'"  ></h1>');
                evaluar();
                $('#tabla').append(fila);

            }else{

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Por favor llene todos los campos',
                })


            }
        }
        function limpiar(){
            $('#Producto').val('');
            $('#Precio_compra').val('');
            $('#Precio_venta').val('');
            $('#Cantidad').val('');
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
            total=total-subtotal[index];
            if (total <= 0){
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



</script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>




@endsection
