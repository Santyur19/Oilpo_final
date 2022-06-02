<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Tipo_documento;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class ClienteController
 * @package App\Http\Controllers
 */
class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        abort_if(Gate::denies('ClienteGuardar'), 401);

        // Variable para el permiso en las vistas ---------------------------------------------------------------------------------
        $role=auth()->user()->roles[0]->id;
        $Permiso_consulta=DB::Select("SELECT permission_id as permiso FROM role_has_permissions WHERE role_id = $role");



        foreach ($Permiso_consulta as $permisos){

            $Permiso_inicial[]= array ("permiso" => $permisos->permiso);
        }
        $rol=Json_encode($Permiso_inicial);
        //------------------------------------------------------------------------------------------------------------------------
        $clientes = Cliente::paginate();
        //$Tipo_documento = DB::select("SELECT DISTINCT Tipo_documento FROM clientes WHERE Tipo_documento != id");
        $Tipo_documento = Tipo_documento::all();

        return view('cliente.index', compact('clientes', 'Tipo_documento', 'rol'))->with('i', (request()->input('page', 1) - 1) * $clientes->perPage());
    }

    public function cliente_guardar(){
        abort_if(Gate::denies('ClienteGuardar'), 401);

        // Variable para el permiso en las vistas ---------------------------------------------------------------------------------
        $role=auth()->user()->roles[0]->id;
        $Permiso_consulta=DB::Select("SELECT permission_id as permiso FROM role_has_permissions WHERE role_id = $role");



        foreach ($Permiso_consulta as $permisos){

            $Permiso_inicial[]= array ("permiso" => $permisos->permiso);
        }
        $rol=Json_encode($Permiso_inicial);
        //------------------------------------------------------------------------------------------------------------------------

        $campos = request()->validate([
            'Tipo_documento'=> 'required',
            'Documento' =>'required|unique:clientes,Documento',
            'Nombre' => 'required',
            'Apellidos'=>'required',
            'Telefono'=>'required',
            'Direccion'=>'required'
        ]);

        Cliente::create($campos);


        return redirect()->route('clientes.index', compact('rol')) ->with('success', ' ');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     $cliente = new Cliente();
    //     return view('cliente.create', compact('cliente'));
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     request()->validate(Cliente::$rules);

    //     $cliente = Cliente::create($request->all());

    //     return redirect()->route('clientes.index');

    // }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort_if(Gate::denies('editar_cliente'), 401);
        $cliente = Cliente::find($id);

        return view('cliente.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
/*     public function edit($id)
    {
        $cliente = Cliente::find($id);

        return view('cliente.edit', compact('cliente'));
    }
 */
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Cliente $cliente
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Cliente $cliente)
    // {
    //     request()->validate(Cliente::$rules);

    //     $cliente->update($request->all());

    //     return redirect()->route('clientes.index');

    // }
    public function Editar_cliente (Cliente  $cliente){
        abort_if(Gate::denies('editar_cliente'), 401);


        // Variable para el permiso en las vistas ---------------------------------------------------------------------------------
        $role=auth()->user()->roles[0]->id;
        $Permiso_consulta=DB::Select("SELECT permission_id as permiso FROM role_has_permissions WHERE role_id = $role");



        foreach ($Permiso_consulta as $permisos){

            $Permiso_inicial[]= array ("permiso" => $permisos->permiso);
        }
        $rol=Json_encode($Permiso_inicial);
        //------------------------------------------------------------------------------------------------------------------------

        $campos_cliente = request()->validate([
            'Tipo_documento'=> 'required',
            'Documento' =>'required',
            'Nombre' => 'required',
            'Apellidos'=>'required',
            'Telefono'=>'required',
            'Direccion'=>'required'
        ]);
        $cliente->update($campos_cliente);

        return redirect()->route('clientes.index',compact('rol')) ->with('success', 'cliente created successfully.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id)->delete();

        // Variable para el permiso en las vistas ---------------------------------------------------------------------------------
        $role=auth()->user()->roles[0]->id;
        $Permiso_consulta=DB::Select("SELECT permission_id as permiso FROM role_has_permissions WHERE role_id = $role");



        foreach ($Permiso_consulta as $permisos){

            $Permiso_inicial[]= array ("permiso" => $permisos->permiso);
        }
        $rol=Json_encode($Permiso_inicial);
        //------------------------------------------------------------------------------------------------------------------------
        return redirect()->route('clientes.index', compact('rol'))
            ->with('borrado', 'Proveedore deleted successfully');
    }

    public function update_status(){
        abort_if(Gate::denies('Editar_estado_cliente'), 401);
        $id = $_POST['id'];
        $activo = isset($_POST['Activo']);
        $campos = request()->validate([
            'estado' =>' '
        ]);
        if($activo=="Activo"){
        DB::update("UPDATE clientes SET estado ='Inactivo' WHERE id='".$id."'");

        // Variable para el permiso en las vistas ---------------------------------------------------------------------------------
        $role=auth()->user()->roles[0]->id;
        $Permiso_consulta=DB::Select("SELECT permission_id as permiso FROM role_has_permissions WHERE role_id = $role");



        foreach ($Permiso_consulta as $permisos){

            $Permiso_inicial[]= array ("permiso" => $permisos->permiso);
        }
        $rol=Json_encode($Permiso_inicial);
        //------------------------------------------------------------------------------------------------------------------------
            return redirect()->route('clientes.index', compact('rol'));



        }else{
            DB::update("UPDATE clientes SET estado ='Activo' WHERE id ='".$id."'");

        // Variable para el permiso en las vistas ---------------------------------------------------------------------------------
        $role=auth()->user()->roles[0]->id;
        $Permiso_consulta=DB::Select("SELECT permission_id as permiso FROM role_has_permissions WHERE role_id = $role");



        foreach ($Permiso_consulta as $permisos){

            $Permiso_inicial[]= array ("permiso" => $permisos->permiso);
        }
        $rol=Json_encode($Permiso_inicial);
        //------------------------------------------------------------------------------------------------------------------------
            return redirect()->route('clientes.index',compact('rol'));

        }

}
}
