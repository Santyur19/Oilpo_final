<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
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
        $clientes = Cliente::paginate();

        return view('cliente.index', compact('clientes'))->with('i', (request()->input('page', 1) - 1) * $clientes->perPage());
    }

    public function cliente_guardar(){
        $campos = request()->validate([
            'Tipo_documento'=> 'required',
            'Documento' =>'required|unique:clientes,Documento',
            'Nombre' => 'required',
            'Apellidos'=>'required',
            'Telefono'=>'required',
            'Direccion'=>'required'
        ]);

        Cliente::create($campos);
        return redirect()->route('clientes.index') ->with('success', ' ');
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
        $campos_cliente = request()->validate([
            'Tipo_documento'=> 'required',
            'Documento' =>'required',
            'Nombre' => 'required',
            'Apellidos'=>'required',
            'Telefono'=>'required',
            'Direccion'=>'required'
        ]);
        $cliente->update($campos_cliente);
        return redirect()->route('clientes.index') ->with('success', 'cliente created successfully.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id)->delete();

        return redirect()->route('clientes.index')
            ->with('borrado', 'Proveedore deleted successfully');
    }

    public function update_status(){
        $id = $_POST['id'];
        $activo = isset($_POST['Activo']);
        $campos = request()->validate([
            'estado' =>' '
        ]);
        if($activo=="Activo"){
            DB::update("UPDATE clientes SET estado ='Inactivo' WHERE id='".$id."'");
            return redirect()->route('clientes.index');



        }else{
            DB::update("UPDATE clientes SET estado ='Activo' WHERE id ='".$id."'");
            return redirect()->route('clientes.index');

        }





}
}
