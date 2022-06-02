<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;



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
        abort_if(Gate::denies('Roles_guardar'), 401);
        $rol = Role::all();


        // $roles = DB::select("SELECT id, rol, id_user, permisos FROM roles");
        //return view(view:'role.index', data: compact(var_name:'rol'));
        return view(view:'role.index', data: compact(var_name:'rol'));

    }

    public function create()
    {
        abort_if(Gate::denies('Roles_crear'), 401);
        $permissions = Permission::all()->where('estado', 'Activo')->pluck(value:'name', key:'id');

        return view(view:'role.create', data: compact(var_name:'permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'permissions'=> 'required'
        ]);
        $roles= Role::create($request->only('name'));
        // $role->permissions()->sync($request->input('permissions', []));
        $roles->syncPermissions($request->input('permissions', []));

        $rol = Role::all();


        return view ('role.index', compact('rol'))->with('success',' ');
    }


    public function guardar(){
        abort_if(Gate::denies('Roles_guardar'), 401);

        return view('role.index');

    }

    // public function show($id)
    // {
    //     $roles = Role::find($id);

    //     return view('role.show', compact('roles'));
    // }


    public function edit(Role $roles)
    {
        abort_if(Gate::denies('Roles_editar'), 401);


        $permissions = Permission::all()->pluck('name', 'id');
        $roles->load('permissions');

        return view('role.edit', compact('roles', 'permissions'));
    }

    public function update(Request $request, Role $roles)
    {
        abort_if(Gate::denies('Roles_editar'), 401);
        $request->validate([
            'name' => 'required',
            'permissions'=> 'required'
        ]);
        $roles->update($request->only('name'));

        // $role->permissions()->sync($request->input('permissions', []));
        $roles->syncPermissions($request->input('permissions', []));

        return redirect()->route('roles.index');
    }

    public function destroy($id)
    {
        $roles = Role::find($id)->delete();

        return redirect()->route('roles.index')
            ->with('borrado', 'Rol deleted successfully');
    }

    public function update_status(){
        abort_if(Gate::denies('Editar_estado_rol'), 401);
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
    public function volver_rol(){
        return redirect ('roles');
    }

}
