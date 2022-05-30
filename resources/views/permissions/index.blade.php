
@extends('adminlte::page')

@section('title', '| Permisos')

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

<div class="card text-center">
  <div class="card-header">
    <h3>Permisos</h3>
  </div>
  <div class="card-body">
    <table id="tabla" class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($permissions as $permission){?>
            <tr>
                <td>{{ $permission->id }}</td>
                <td>{{ $permission->name }}</td>
                <td>
                    <form action="{{ route('Editar_estado_permiso') }}" method="POST">
                        @csrf @method('PUT')

                        <?php if($permission->estado=="Activo") { ?>
                            <input  hidden type="number" name="id" value="<?php echo $permission->id ?>">
                            <input hidden type="text" name="Activo" id="" value="<?php echo $permission->estado ?>">
                            @can('Editar_estado_permiso')
                            <button type="submit" class="btn btn-success"><?php echo $permission->estado ?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                                    <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                                    <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                                </svg>
                            </button>
                            @endcan
                        <?php }else{ ?>
                            <input hidden  type="number" name="id" value="<?php echo $permission->id ?>">
                            <input hidden  type="text" name="Inactivo" id="" value="<?php echo $permission->estado ?>">
                            @can('Editar_estado_permiso')
                            <button type="submit" class="btn btn-secondary"><?php echo $permission->estado ?></button>
                            @endcan
                        <?php } ?>
                    </form>
                </td>
            </tr>
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


@endsection
