<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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
        $productos = Producto::paginate();

        return view('producto.index', compact('productos'))
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
        $campos = request()->validate([
            'Nombre_Producto' =>'required|unique:productos,Nombre_Producto|min:3',
            'Valor_Producto'=> 'required',
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
        $producto = Producto::find($id);

        return view('producto.show', compact('producto'));
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
        $campos = request()->validate([
            'Nombre_Producto' =>'required|min:3',
            'Valor_Producto'=> 'required',
            'Cantidad_Producto' => 'required'
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
        $producto = Producto::find($id)->delete();

        return redirect()->route('productos.index')
            ->with('borrado', ' ');
    }

    public function cerrar(){
        return redirect()->route('productos.index');
    }

    public function update_status(){
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
