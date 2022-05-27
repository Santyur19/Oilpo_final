@extends('adminlte::page')

@section('title', '| Agregar compra')

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
                                    <select  style="width: 100%" class="chosen-select" name="Nombre_proveedor" id="select_proveedor">
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
                                <label for="">Foto <small style="color:red;"></small></label>
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
                            <select style="width: 100%" class="chosen-select" name="Producto" id="Producto">
                                <option value=" ">Seleccione</option>
                                <?php foreach($productos as  $producto){ ?>
                                <option value="<?php echo $producto->Nombre_Producto ?>"><?php echo $producto->Nombre_Producto ?></option>
                                <?php } ?>
                            </select>
                            <br>
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
                <span id="total">

                </span>
            <table id="tabla" class="table">
                <thead>

                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio compra</th>
                        <th>Precio venta</th>
                        <th>Sub total</th>
                        <th>
                            <button id="borrar" type="button" class="btn btn-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                </svg>
                            </button>
                        </th>
                    </tr>
                </thead>
                <tbody>


                </tbody>
            </table>

        </div>
        <div class="text-center">
            @can('Guardar_compra')
            <button id="guardar" type="submit" class="btn btn-primary">Agregar</button>
            @endcan
            <button id="cancelar" type="button" onclick="cancelar()" class="btn btn-danger">Cancelar</button>

        </div>

    </form>

        <div class="text-center"> 
                        <a type="button" class="btn btn-info" href="/ventas">
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
    //LIMITE INPUT PRECIO COMPRA
    var input=  document.getElementById('Precio_compra');
    input.addEventListener('input',function(){
    if (this.value.length > 0)
        this.value = this.value.slice(0,8);
    })
    //LIMITE INPUT PRECIO VENTA
    var input=  document.getElementById('Precio_venta');
    input.addEventListener('input',function(){
    if (this.value.length > 0)
        this.value = this.value.slice(0,8);
    })

    //LIMITE INPUT CANTIDAD
    var input=  document.getElementById('Cantidad');
    input.addEventListener('input',function(){
    if (this.value.length > 0)
        this.value = this.value.slice(0,4);
    })


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
    $('#tabla').hide();
    $('#guardar').hide();
    $('#cancelar').hide();
    function agregar(){
        // producto = $('#Productos').val();
        var producto = $("#Producto option:selected").text();
        precio_compra = $('#Precio_compra').val();
        precio_venta = $('#Precio_venta').val();
        cantidad = $('#Cantidad').val();

        if(producto !="Seleccione" && cantidad > 0 && precio_compra > 0 && precio_venta > 0){
            subtotal[cont]=(cantidad*precio_compra);
            total = total+subtotal[cont];

            var fila = '<tr id="fila'+cont+'"><td><input  type="text" name="Productos[]" class="form-control" aria-label="Amount (to the nearest dollar)" value="'+producto+'" readonly ></td><td><input type="number" name="Cantidades[]" class="form-control" aria-label="Amount (to the nearest dollar)" value="'+cantidad+'" readonly ></td><td><input type="number" name="Precios_compra[]" class="form-control" aria-label="Amount (to the nearest dollar)" value="'+precio_compra+'" readonly></td><td><input type="number" name="Precios_venta[]" class="form-control" aria-label="Amount (to the nearest dollar)" value="'+precio_venta+'" readonly></td><td><input type="number" class="form-control" aria-label="Amount (to the nearest dollar)" value="'+subtotal[cont]+'" readonly></td><td><button class="btn btn-danger" onclick="eliminar('+cont+');" >X</button></td></tr>';
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
            $('#tabla').show();
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
<script src="{{ asset('plugins/Chosen/chosen.jquery.js') }}"></script>

<script>
    $(".chosen-select").chosen();
</script>
<style>
    .chosen-container-single .chosen-single div {
        padding-top: 4px;
    }
    .chosen-container-single .chosen-single {
        height: 32px !important;
        padding: 4px 0 0 10px !important;
    }
</style>

@endsection
