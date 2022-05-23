@extends('adminlte::page')

@section('title', '| Agregar usuario')

@section('css')
    <link rel="icon" href="\vendor\adminlte\dist\img\Moto.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@endsection
@section('template_title')
@endsection

@section('content')
    <div class="content">
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-12">
            <form action="{{ route('Usuario_guardar') }}" method="post" class="form-horizontal">
            @csrf
            <div class="card">
                <div class="card-header card-header-primary">
                <p class="card-category">Ingresar datos</p>
                </div>
                <div class="card-body">
                {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif --}}
                <div class="row">
                    <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                    <div class="col-sm-7">
                    <input type="text" class="form-control" name="name" placeholder="Ingrese su nombre" value="{{ old('name') }}" autofocus>
                    @if ($errors->has('name'))
                        <span class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                    @endif
                    </div>
                </div>
                <div class="row">
                    <label for="username" class="col-sm-2 col-form-label">Nombre de usuario</label>
                    <div class="col-sm-7">
                    <input type="text" class="form-control" name="username" placeholder="Ingrese su nombre de usuario" value="{{ old('username') }}">
                    @if ($errors->has('name'))
                        <span class="error text-danger" for="input-username">{{ $errors->first('name') }}</span>
                    @endif
                    </div>
                </div>
                <div class="row">
                    <label for="email" class="col-sm-2 col-form-label">Correo</label>
                    <div class="col-sm-7">
                    <input type="email" class="form-control" name="email" placeholder="Ingrese su correo" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                    @endif
                    </div>
                </div>
                <div class="row">
                    <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
                    <div class="col-sm-7">
                    <input type="password" class="form-control" name="password" placeholder="Contraseña">
                    @if ($errors->has('password'))
                        <span class="error text-danger" for="input-password">{{ $errors->first('password') }}</span>
                    @endif
                    </div>
                </div>
                <div class="row">
                    <label for="roles" class="col-sm-2 col-form-label">Roles</label>
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
                </div>
                <!--End footer-->
            </div>
            </form>
            </form>
            <form action="{{ route('volver_usuario') }}" method="get">
            @csrf
                <div class="text-center" >
                <button id="volver" type="submit" name="volver" value="volver" class="btn btn-danger">Cancelar</button>
                </div>

            </form>
        </div>
        </div>
    </div>
    </div>
@endsection