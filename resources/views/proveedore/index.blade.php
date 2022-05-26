@extends('adminlte::page')

@section('title', '| Preveedores')

@section('css')
    <link rel="icon" href="\vendor\adminlte\dist\img\Moto.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@endsection
@section('template_title')

@endsection

@section('content')
<br>
<div class="card">
    <div class="card-header">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <br>
            <span id="card_title">
                <h3>Proveedores</h3>
            </span>
            @can('Proveedores_guardar')
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalproveedores" data-bs-whatever="@mdo">Agregar
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus-circle-dotted" viewBox="0 0 16 16">
                    <path d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0zM6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458L4.46.824zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66zm1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8zM.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752zm-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                </svg>
            </button>
            @endcan
        </div>
    </div>
    <div class="card-body">
        <!--Modal agregar-->
        <div class="modal fade" id="modalproveedores" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Proveedor</h5>

                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->

                    </div>
                    <div class="modal-body">
                        <form action="{{ route('Proveedores_guardar') }}" method="POST" >
                            @csrf
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Tipo Documento <small style="color:red;">*</small></label>
                                <select require class="form-select"  id="" name="Tipo_Doc_proveedor" >
                                    <option class="form-control" id="recipient-name" value="" >Seleccione tipo documento...</option>
                                    <option class="form-control" id="recipient-name" value="Cédula de ciudadania">Cédula de ciudadania</option>
                                    <option class="form-control" id="recipient-name" value="Cédula Extranjeria">Cédula Extranjeria</option>
                                    <option class="form-control" id="recipient-name" value="NIT">NIT</option>
                                </select>
                                <small class="text-danger">{{$errors->first('Tipo_Doc_proveedor')}}</small>
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Documento <small style="color:red;">*</small></label>
                                <input type="number" name="Documento_proveedor" class="form-control" id="recipient-name" value="{{old('Documento_proveedor')}}">
                                <small class="text-danger">{{$errors->first('Documento_proveedor')}}</small>
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Nombre <small style="color:red;">*</small></label>
                                <input type="text" name="Nombre_proveedor" class="form-control" id="recipient-name" value="{{old('Nombre_proveedor')}}">
                                <small class="text-danger">{{$errors->first('Nombre_proveedor')}}</small>
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Teléfono <small style="color:red;">*</small></label>
                                <input type="number" name="Telefono_proveedor" class="form-control" id="recipient-name" value="{{old('Telefono_proveedor')}}">
                                <small class="text-danger">{{$errors->first('Telefono_proveedor')}}</small>
                            </div>
                            <div>
                                <label for="message-text" class="col-form-label">Ciudad <small style="color:red;">*</small></label>

                                <select  class="form-select" id="recipient-name" name="Ciudad_proveedor" >
                                    <option class="form-select" id="recipient-name" value="">Seleccione</option>
                                <?php foreach($ciudad as $ciudades){ ?>
                                    <option  class="form-select" id="recipient-name" value="<?php echo $ciudades->Nombre ?>"><?php echo $ciudades->Nombre ?></option>
                                <?php } ?>
                                </select>
                                <small class="text-danger">{{$errors->first('Ciudad_proveedor')}}</small>
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Dirección <small style="color:red;">*</small></label>
                                <input type="text" name="Direccion_proveedor" class="form-control" id="recipient-name" value="{{old('Direccion_proveedor')}}"></input>
                                <small class="text-danger">{{$errors->first('Direccion_proveedor')}}</small>
                            </div>
                            <div class="modal-footer">
                                <button id="cerrar" type="button" class="btn btn-danger">Cancelar
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </button>
                                <button type="3" class="btn btn-success">Agregar
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle-dotted" viewBox="0 0 16 16">
                                    <path d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0zM6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458L4.46.824zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66zm1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8zM.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752zm-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                                </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- datatable-->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover" id="tabla">
                    <thead class="thead">
                        <tr>
                            <th>No</th>
                            <th>Tipo de documento</th>
                            <th>Documento</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Teléfono</th>
                            <th>Dirección</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($proveedores as $proveedore)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $proveedore->Tipo_Doc_proveedor }}</td>
                                <td>{{ $proveedore->Documento_proveedor }}</td>
                                <td>{{ $proveedore->Nombre_proveedor }}</td>
                                <td>{{ $proveedore->Telefono_proveedor }}</td>
                                <td>{{ $proveedore->Ciudad_proveedor }}</td>
                                <td>{{ $proveedore->Direccion_proveedor }}</td>

                                <td>
                                    <?php if($proveedore->estado=="Activo"){ ?>
                                        @can('editar')
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editar{{$proveedore->id}}" data-bs-whatever="@mdo">Editar
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                                        </svg>
                                        </button>
                                        @endcan
                                    <?php }else{ ?>
                                        @can('editar')
                                        <button disabled type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editar{{$proveedore->id}}" data-bs-whatever="@mdo">Editar
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                                        </svg>
                                        </button>
                                        @endcan
                                    <?php } ?>
                                </td>
                                <td>
                                    <form action="{{ route('Editar_estado_proveedor') }}" method="POST">
                                        @csrf @method('PUT')

                                        <?php if($proveedore->estado=="Activo") { ?>
                                            <input  hidden type="number" name="id" value="<?php echo $proveedore->id ?>">
                                            <input hidden type="text" name="Activo" id="" value="<?php echo $proveedore ?>">
                                            @can('Editar_estado_proveedor')
                                            <button type="submit" class="btn btn-success"><?php echo $proveedore->estado ?>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                                                    <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                                                    <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                                                </svg>
                                            </button>
                                            @endcan
                                        <?php }else{ ?>
                                            <input hidden  type="number" name="id" value="<?php echo $proveedore->id ?>">
                                            <input hidden  type="text" name="Inactivo" id="" value="<?php echo $proveedore->estado ?>">
                                            @can('Editar_estado_proveedor')
                                            <button type="submit" class="btn btn-secondary"><?php echo $proveedore->estado ?></button>
                                            @endcan
                                        <?php } ?>
                                    </form>
                                </td>
                            </tr>
                            <!-- modal editar -->
                            <div class="modal fade" id="editar{{$proveedore->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Editar Proveedores</h5>
                                            <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                        </div>
                                    <div class="modal-body">

                                        <form action="{{ route('editar', $proveedore) }}" method="POST" >
                                            @csrf @method('PUT')
                                            <div class="mb-3">
                                                <label for="message-text" class="col-form-label" >Tipo Documento <small style="color:red;">*</small></label>
                                                <select require class="form-select" id="recipient-name" name="Tipo_Doc_proveedor" >

                                                <?php

                                                switch($proveedore->Tipo_Doc_proveedor){

                                                    case "NIT":
                                                    echo '<option class="form-select" id="recipient-name" value="'.$proveedore->Tipo_Doc_proveedor.'" disable>'.$proveedore->Tipo_Doc_proveedor.'</option>';
                                                    echo '<option class="form-select" id="recipient-name" value="Cédula de ciudadania">Cédula de ciudadania</option>';
                                                    echo '<option class="form-select" id="recipient-name" value="Cédula Extranjeria">Cédula Extranjeria</option>';
                                                        break;

                                                    case "Cédula Extranjeria":
                                                    echo '<option class="form-select" id="recipient-name" value="'.$proveedore->Tipo_Doc_proveedor.'" disable>'.$proveedore->Tipo_Doc_proveedor.'</option>';
                                                    echo '<option class="form-select" id="recipient-name" value="NIT">NIT</option>';
                                                    echo '<option class="form-select" id="recipient-name" value="Cédula de ciudadania">Cédula de ciudadania</option>';
                                                        break;

                                                    case "Cédula de ciudadania":
                                                    echo '<option class="form-select" id="recipient-name" value="'.$proveedore->Tipo_Doc_proveedor.'" disable>'.$proveedore->Tipo_Doc_proveedor.'</option>';
                                                    echo '<option class="form-select" id="recipient-name" value="NIT">NIT</option>';
                                                    echo '<option class="form-select" id="recipient-name" value="Cédula Extranjeria">Cédula Extranjeria</option>';
                                                        break;
                                                };

                                                ?>
                                                </select>
                                                <small class="text-danger">{{$errors->first('Tipo_Doc_proveedor')}}</small>
                                            </div>
                                            <div class="mb-3">
                                                <label for="message-text" class="col-form-label">Documento <small style="color:red;">*</small></label>
                                                <input type="number" name="Documento_proveedor" class="form-control" id="recipient-name" value="{{old('Documento_proveedor', $proveedore->Documento_proveedor)}}">
                                                <small class="text-danger">{{$errors->first('Documento_proveedor')}}</small>

                                            </div>
                                            <div class="mb-3">
                                                <label for="message-text" class="col-form-label">Nombre <small style="color:red;">*</small></label>
                                                <input type="text" name="Nombre_proveedor" class="form-control" id="recipient-name" value="{{old('Nombre_proveedor', $proveedore->Nombre_proveedor)}}">
                                                <small class="text-danger">{{$errors->first('Nombre_proveedor')}}</small>

                                            </div>
                                            <div class="mb-3">
                                                <label for="message-text" class="col-form-label">Teléfono <small style="color:red;">*</small></label>
                                                <input type="number" name="Telefono_proveedor" class="form-control" id="recipient-name" value="{{old('Telefono_proveedor' , $proveedore->Telefono_proveedor)}}">
                                                <small class="text-danger">{{$errors->first('Telefono_proveedor')}}</small>
                                            </div>
                                            <div class="mb-3">
                                                <label for="message-text" class="col-form-label">Ciudad <small style="color:red;">*</small></label>
                                                <select require class="form-select" id="recipient-name" name="Ciudad_proveedor" >
                                                    <option value="{{old('Ciudad_proveedor', $proveedore->Ciudad_proveedor)}}">{{old('Ciudad_proveedor', $proveedore->Ciudad_proveedor)}}</option>
                                                    <?php foreach($ciudad as $ciudades){ ?>
                                                        <option class="form-select" id="recipient-name" value="<?php echo $ciudades->Nombre ?>"><?php echo $ciudades->Nombre ?></option>
                                                    <?php }?>
                                                </select>
                                                <small class="text-danger">{{$errors->first('Ciudad_proveedor')}}</small>
                                            </div>

                                            <div class="mb-3">
                                                <label for="message-text" class="col-form-label">Dirección <small style="color:red;">*</small></label>
                                                <input type="text" name="Direccion_proveedor" class="form-control" id="recipient-name" value="{{old('Direccion_proveedor', $proveedore->Direccion_proveedor)}}">
                                                <small class="text-danger">{{$errors->first('Direccion_proveedor')}}</small>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="" type="button" id="cerrar" class="btn btn-danger" data-bs-dismiss="modal">Cancelar
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                    </svg>
                                                </a>
                                                <button type="submit" class="btn btn-success">Agregar
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle-dotted" viewBox="0 0 16 16">
                                                    <path d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0zM6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458L4.46.824zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66zm1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8zM.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752zm-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                                                </svg>
                                                </button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                            <!-- END MODAL EDITAR -->
                        @endforeach
                    </tbody>
                </table>
                @yield('js')
                <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
                <script>
                    $('#tabla').DataTable({"language": {"url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"}});
                    $(document).ready(function(){
                        let table = $('#tabla').DataTable({
                            reponsive:true

                        });

                    });
                </script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('keydown', function(event){
        if(event.key === "Escape"){
            cerrar();
        }
    });
    $(document).ready(function(){
        $('#cerrar').click(function(){
            cerrar();

            });
        });
    </script>
    <script>
        function cerrar(){
            location.reload();
            $('body').removeClass('modalproveedores');
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
    <script>

        $('.borrar').submit(function(e){
            e.preventDefault();
            Swal.fire({
                title: '¿Está seguro de borrar el registro?',
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
    <?php if($message = Session::get('borrado')){ ?>
    <p>{{$message}}</p>
        <script>
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'ELIMINADO CON EXITO!',
            showConfirmButton: false,
            timer: 1500
        })

        </script>
    <?php } ?>

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
    <?php if($errors->any()){ ?>
        <script>
            $(document).ready(function(){
                $('#modalproveedores').modal('show')
            })
        </script>
    <?php } ?>
@endsection
