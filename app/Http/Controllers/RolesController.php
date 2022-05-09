<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
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
        $rol = Role::all();
        

        // $roles = DB::select("SELECT id, rol, id_user, permisos FROM roles");
        //return view(view:'role.index', data: compact(var_name:'rol'));
        return view(view:'role.index', data: compact(var_name:'rol'));

    }

    public function create()
    {
        $permissions = Permission::all()->pluck(value:'name', key:'id');  

        return view(view:'role.create', data: compact(var_name:'permissions'));
    }
    


    public function guardar(){

        return view('role.index');
       
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

    public function update_status(){
        $id = $_POST['id'];
        $activo = isset($_POST['Activo']);
        $campos = request()->validate([
            'estado' =>' '
        ]);
        if($activo=="Activo"){
            DB::update("UPDATE roles SET estado ='Inactivo' WHERE id='".$id."'");
            return redirect()->route('roles.index');



        }else{
            DB::update("UPDATE roles SET estado ='Activo' WHERE id ='".$id."'");
            return redirect()->route('roles.index');

        }
    }

}
