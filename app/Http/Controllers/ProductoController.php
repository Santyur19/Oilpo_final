<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;


/**
 * Class ProductoController
 * @package App\Http\Controllers
 */
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('Editar_estado'), 403);

        // Variable para el permiso en las vistas ---------------------------------------------------------------------------------
        $role=auth()->user()->roles[0]->id;
        $Permiso_consulta=DB::Select("SELECT permission_id as permiso FROM role_has_permissions WHERE role_id = $role");



        foreach ($Permiso_consulta as $permisos){

            $Permiso_inicial[]= array ("permiso" => $permisos->permiso);
        }
        $rol=Json_encode($Permiso_inicial);
        //------------------------------------------------------------------------------------------------------------------------

        $productos = Producto::paginate();

        return view('producto.index', compact('productos', 'rol'))
            ->with('i', (request()->input('page', 1) - 1) * $productos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /* public function create()
    {
        $producto = new Producto();
        return view('producto.create', compact('producto'));
    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    /* public function store(Request $request)
    {
        request()->validate(Producto::$rules);

        $producto = Producto::create($request->all());

        return redirect()->route('productos.index')
            ->with('success', 'Producto created successfully.');
    }*/

    public function guardar(){
        abort_if(Gate::denies('ProductoGuardar'), 403);
        $campos = request()->validate([
            'Nombre_Producto' =>'required|unique:productos,Nombre_Producto|min:3',
            'Valor_venta'=> 'required',
            'Valor_compra'=> 'required',
            'Cantidad_Producto' => 'required'
        ]);
        Producto::create($campos);
        return redirect()->route('productos.index') ->with('success', 'El producto se ha guardado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // Variable para el permiso en las vistas ---------------------------------------------------------------------------------
        $role=auth()->user()->roles[0]->id;
        $Permiso_consulta=DB::Select("SELECT permission_id as permiso FROM role_has_permissions WHERE role_id = $role");



        foreach ($Permiso_consulta as $permisos){

            $Permiso_inicial[]= array ("permiso" => $permisos->permiso);
        }
        $rol=Json_encode($Permiso_inicial);
        //------------------------------------------------------------------------------------------------------------------------

        abort_if(Gate::denies('ProductoGuardar'), 403);
        $producto = Producto::find($id);

        return view('producto.show', compact('producto', 'rol'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    /*public function edit($id)
    {
        $producto = Producto::find($id);

        return view('producto.edit', compact('producto'));
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Producto $producto
     * @return \Illuminate\Http\Response
     */
    /*public function update(Request $request, Producto $producto)
    {
        request()->validate(Producto::$rules);

        $producto->update($request->all());

        return redirect()->route('productos.index')
            ->with('success', 'Producto updated successfully');
    }*/
    public function editar(Producto  $producto){
        abort_if(Gate::denies('Editar_estado'), 403);
        $campos = request()->validate([
            'Nombre_Producto' =>'required|min:3',
            
        ]);
        $producto->update($campos);
        return redirect()->route('productos.index') ->with('success', ' ');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('Editar_estado'), 403);
        $producto = Producto::find($id)->delete();

        return redirect()->route('productos.index')
            ->with('borrado', ' ');
    }

    public function cerrar(){
        return redirect()->route('productos.index');
    }

    public function update_status(){
        abort_if(Gate::denies('Editar_estado'), 403);
            $id = $_POST['id'];
            $activo = isset($_POST['Activo']);
            $campos = request()->validate([
                'estado' =>' '
            ]);
            if($activo=="Activo"){
                DB::update("UPDATE productos SET estado ='Inactivo' WHERE id='".$id."'");
                return redirect()->route('productos.index');



            }else{
                DB::update("UPDATE productos SET estado ='Activo' WHERE id ='".$id."'");
                return redirect()->route('productos.index');

            }





    }
}
