@extends('adminlte::page')

@section('title', '| Editar rol')

@section('css')
<link rel="icon" href="\vendor\adminlte\dist\img\Moto.png">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">

@endsection
@section('template_title')

@endsection

@section('content')

<form method="POST" action="{{ route('Editar', $roles) }}" class="form-horizontal">
    @csrf @method('PUT')
    <div class="card text-center">
        <div class="card-header">
            <label for="">Nombre</label>
            <input type="text" class="form-control" name="name" value="{{ old('name', $roles->name) }}" required>
            <span class="error text-danger" for="input-Nombre_Rol">{{ $errors->first('name') }}</span>
        </div>
        <br>
        <div class="card-body">
            <table id="tabla" class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($permissions as $id => $permission)
                    <tr>
                        <td>
                            <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $id }}" {{ $roles->permissions->contains($id) ? 'checked' : '' }} >
                            <span class="form-check-sign">
                                <span class="check" value=""></span>
                            </span>
                        </td>
                        <td>
                            {{ $permission }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
            @yield('js')
            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
            <script>
                $('#tabla').DataTable({"language": {"url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"}});
                $(document).ready(function(){
                    let table = $('#tabla').DataTable({
                        reponsive:true,
                    });
                });
            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            </table>
        </div>
        <div class="card-footer text-muted">
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
    </div>
</form>

@endsection
