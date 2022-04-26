<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class RolesController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     *
     */

    public function index()
    {
        //$roles = Role::paginate();
        // $roles = DB::select("SELECT id, rol, id_user, permisos FROM roles");

         return view('role.index');
    }


    public function guardar(){
        // $campos = request()->validate([
        //     'rol' =>'required',
        //     'permisos[]'=> 'required',
        // ]);
        //Role::create($campos);
        $id_user = $_POST['id_user'];
        $permisos = $_POST['permisos'];
        $rol = $_POST['rol'];
        $cadena= "INSERT INTO roles (rol, id_user, permisos) VALUES ";
        for ($i = 0; $i <count($permisos); $i++){
            $cadena.="('".$rol."', '".$id_user."', '".$permisos[$i]."'),";

        }
        $cadena_final = substr($cadena, 0, -1);
        $cadena_final.=";";
        DB::insert($cadena_final);
        return redirect()->route('roles.index') ->with('success', 'El rol se ha guardado.');
    }

    // public function show($id)
    // {
    //     $roles = Role::find($id);

    //     return view('role.show', compact('roles'));
    // }


    public function editar(Role  $role){
        $campos = request()->validate([
            'rol' =>'required',
            'permisos'=> 'required',
        ]);
        $role->update($campos);
        return redirect()->route('roles.index') ->with('success', ' ');
    }

    public function destroy($id)
    {
        $roles = Role::find($id)->delete();

        return redirect()->route('roles.index')
            ->with('borrado', 'Rol deleted successfully');
    }
}
