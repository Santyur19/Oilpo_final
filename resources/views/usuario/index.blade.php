@extends('adminlte::page')

@section('title', '| Usuarios')

@section('css')
    <link rel="icon" href="\vendor\adminlte\dist\img\Moto.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@endsection
@section('template_title')
@endsection

@section('content')
<div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                        <br>
                        <span id="card_title">
                        <h3>Usuarios</h3>
                            
                        </span>
                            <!-- <form action="{{ route('Usuario_crear') }}">
                                <button type="submit"  class="btn btn-success">Agregar 
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus-circle-dotted" viewBox="0 0 16 16">
                                    <path d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0zM6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458L4.46.824zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66zm1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8zM.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752zm-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                                </svg>
                                </button>
                            </form> -->
                            <!-- modal agregar -->
                            @can('Usuario_crear')
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Agregar
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus-circle-dotted" viewBox="0 0 16 16">
                                    <path d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0zM6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458L4.46.824zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66zm1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8zM.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752zm-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                                </svg>
                            </button>

                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Agregar</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    
                                    </button>
                                </div>
                            <div class="modal-body">
                                <form action="{{ route('Usuario_guardar') }}" method="post" class="form-horizontal">
                                    @csrf
                                    <div class="card">
                                        <div class="card-body">
                                            <!-- <div class="alert alert-danger">
                                                <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                                </ul>
                                            </div> -->
                                    
                                            <div class="row">
                                                <label for="name" class="col-sm-2 col-form-label">Nombre <small style="color:red;">*</small></label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="name" placeholder="Ingrese su nombre" value="" autofocus>
                                                @if ($errors->has('name'))
                                                    <span class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                                <label for="username" class="col-sm-2 col-form-label">Nombre de usuario <small style="color:red;">*</small></label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="username" placeholder="Ingrese su nombre de usuario" value="">
                                                @if ($errors->has('name'))
                                                    <span class="error text-danger" for="input-username">{{ $errors->first('name') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="email" class="col-sm-2 col-form-label">Correo <small style="color:red;">*</small></label>
                                            <div class="col-sm-7">
                                                <input type="email" class="form-control" name="email" placeholder="Ingrese su correo" value="">
                                                @if ($errors->has('email'))
                                                    <span class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="password" class="col-sm-2 col-form-label">Contraseña <small style="color:red;">*</small></label>
                                            <div class="col-sm-7">
                                                <input type="password" class="form-control" name="password" placeholder="Contraseña">
                                                @if ($errors->has('password'))
                                                    <span class="error text-danger" for="input-password">{{ $errors->first('password') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="roles" class="col-sm-2 col-form-label">Roles <small style="color:red;">*</small></label>
                                            <div class="col-sm-7">
                                                <div class="form-group">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active">
                                                            <table class="table">
                                                                <tbody>
                                                                    
                                                                    @foreach ($roles as $id => $role)
                                                                    
                                                                    <tr>
                                                                        <td>                                                                        
                                                                            <div class="form-check">
                                                                                <label class="form-check-label">
                                                                                    <input class="form-check-input" type="radio" name="roles[]"
                                                                                        value="{{ $id }}"
                                                                                    >
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                        
                                                                                    </span>
                                                                                    
                                                                                </label>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            {{ $role }}
                                                                            
                                                                        </td>
                                                                        
                                                                    </tr>
                                                                    
                                                                    @endforeach
                                                                    <span class="error text-danger" for="input-password">{{ $errors->first('roles') }}</span>
                                                                </tbody>
                                                                
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <!--Footer-->
                                        <div class="card-footer ml-auto mr-auto">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        </div>
                                        <!--End footer-->
                                    </div>
                                    </form>
                                </div>
                                    <!-- <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    </div> -->
                                </div>
                            </div>
                            </div>
                            @endcan
                            <!-- <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Agregar
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus-circle-dotted" viewBox="0 0 16 16">
                                    <path d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0zM6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458L4.46.824zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66zm1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8zM.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752zm-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                                </svg>
                            </button> -->

                            </div>

                        </div>
                        <div class="card-body">
                            @if (session('success'))
                            <div class="alert alert-success" role="success">
                            {{ session('success') }}
                            </div>
                            @endif
                            <div class="row">
                                <div class="col-12 text-right">
                                    @can('usuario_crear')
                                    <a href="{{ route('usuarios.create') }}" class="btn btn-sm btn-facebook">Añadir usuario</a>
                                    @endcan
                                </div>
                            </div>
                            <div class="table-responsive">
                            <table id="tabla" class="table">
                                <thead >
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Roles</th>
                                    <th>Estado</th>
                                    <th class="text-right">Acciones</th>
                                </thead>
                                <tbody>
                                <?php foreach ($usuarios as $usuario){?>
                                    <tr>
                                    <td>{{ $usuario->id }}</td>
                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ $usuario->email }}</td>
                                
                                    <td>
                                    @forelse ($usuario->roles as $rol)
                                        <span class="badge badge-info">{{ $rol->name }}</span>
                                    @empty
                                        <span class="badge badge-danger">No roles</span>
                                    @endforelse
                                    </td>
                                    <td>
                                    @can('usuario_edit')
                                        <a href="{{ route('Editar_usuario', $usuario->id) }}" class="btn btn-success"> <i
                                        class="material-icons">edit</i> </a>
                                    @endcan
                                    <form action="{{ route('Editar_estado_usuario') }}" method="POST">
                                        @csrf @method('PUT')

                                        <?php if($usuario->estado=="Activo") { ?>
                                            <input  hidden type="number" name="id" value="<?php echo $usuario->id ?>">
                                            <input hidden type="text" name="Activo" id="" value="<?php echo $usuario->estado ?>">
                                            @can('Editar_estado_usuario')
                                            <button type="submit" class="btn btn-success"><?php echo $usuario->estado ?>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                                                    <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                                                    <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                                                </svg>
                                            </button>
                                            @endcan
                                        <?php }else{ ?>
                                            <input hidden  type="number" name="id" value="<?php echo $usuario->id ?>">
                                            <input hidden  type="text" name="Inactivo" id="" value="<?php echo $usuario->estado ?>">
                                            @can('Editar_estado_usuario')
                                            <button type="submit" class="btn btn-secondary"><?php echo $usuario->estado ?></button>
                                            @endcan
                                        <?php } ?>
                                    </form>
                                    </td>
                                    <td>
                                        
                                        <form action="{{ route('Editar_usuario') }}" method="POST">
                                            @csrf @method('PUT')
                                            <?php if($usuario->estado=="Activo"){ ?>
                                                @can('Editar_usuario')
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editar{{ $usuario->id }}" data-bs-whatever="@fat">Editar
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                                                </svg>
                                                </button>
                                                @endcan
                                            <?php }else{ ?>
                                                @can('Editar_usuario')
                                                <button disabled type="button" class="btn btn-warning" data-bs-target="#editar{{ $usuario->id }}" data-bs-whatever="@mdo">Editar
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                                                </svg>
                                                </button>
                                                @endcan
                                            <?php } ?>
                                        </form>                    
                                    </td>

                                </tr>

                                <div class="modal fade" id="editar{{ $usuario->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="row">
                                                        <label for="name" class="col-sm-2 col-form-label">Nombre <small style="color:red;">*</small></label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" name="name" placeholder="Ingrese su nombre" value="{{old('name', $usuario->name)}}" autofocus>
                                                        @if ($errors->has('name'))
                                                            <span class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                        <label for="username" class="col-sm-2 col-form-label">Nombre de usuario <small style="color:red;">*</small></label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" name="username" placeholder="Ingrese su nombre de usuario" value="{{old('name', $usuario->name)}}">
                                                        @if ($errors->has('name'))
                                                            <span class="error text-danger" for="input-username">{{ $errors->first('name') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label for="email" class="col-sm-2 col-form-label">Correo <small style="color:red;">*</small></label>
                                                    <div class="col-sm-7">
                                                        <input type="email" class="form-control" name="email" placeholder="Ingrese su correo" value="{{old('email', $usuario->email)}}">
                                                        @if ($errors->has('email'))
                                                            <span class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-7">
                                                        <div class="form-group">
                                                            <div class="tab-content">
                                                                <div class="tab-pane active">
                                                                    <table class="table">
                                                                        <tbody>
                                                                            @foreach ($roles as $id => $role)
                                                                            <tr>
                                                                                <td>                                                                        
                                                                                    <div class="form-check">
                                                                                        <label class="form-check-label">
                                                                                            <input class="form-check-input" type="radio" name="roles[]" value="{{ $id }}">
                                                                                            <span class="form-check-sign">
                                                                                                <span class="check"></span>
                                                                                            </span>
                                                                                        </label>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    {{ $role }}
                                                                                </td>
                                                                            </tr>
                                                                            @endforeach
                                                                            <span class="error text-danger" for="input-password">{{ $errors->first('roles') }}</span>
                                                                        </tbody>  
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>    
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Send message</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </tbody>
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
                        </table>
                        </div>
                    </div>
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
    <?php if($errors->any()){ ?>
        <script>
            $(document).ready(function(){

                $('#exampleModal').modal('show')
            })
        </script>
    <?php } ?>
@endsection
