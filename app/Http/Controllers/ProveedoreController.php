<?php

namespace App\Http\Controllers;
use App\Models\ciudades;
use App\Models\Proveedore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


/**
 * Class ProveedoreController
 * @package App\Http\Controllers
 */
class ProveedoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores = Proveedore::paginate();
        $ciudad = ciudades::paginate(26);

        return view('proveedore.index', compact('proveedores', 'ciudad'))
            ->with('i', (request()->input('page', 1) - 1) * $proveedores->perPage());
    }


    public function guardar_proveedor(){
        $ciudad = ciudades::all();
        $campos_proveeedor = request()->validate([
            'Tipo_Doc_proveedor'=>'required'  ,
            'Documento_proveedor'=> 'required|unique:proveedores,Documento_proveedor',
            'Nombre_proveedor'=> 'required',
            'Telefono_proveedor'=> 'required',
            'Ciudad_proveedor'=> 'required',
            'Direccion_proveedor'=> 'required'

        ]);
        Proveedore::create($campos_proveeedor);
        return redirect()->route('proveedores.index', compact('ciudad')) ->with('success', 'Proveedore created successfully.');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     $proveedore = new Proveedore();
    //     return view('proveedore.create', compact('proveedore'));
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     request()->validate(Proveedore::$rules);

    //     $proveedore = Proveedore::create($request->all());

    //     return redirect()->route('proveedores.index')
    //         ->with('success', 'Proveedore created successfully.');
    // }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proveedore = Proveedore::find($id);

        return view('proveedore.show', compact('proveedore'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     $proveedore = Proveedore::find($id);

    //     return view('proveedore.edit', compact('proveedore'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Proveedore $proveedore
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Proveedore $proveedore)
    // {
    //     request()->validate(Proveedore::$rules);

    //     $proveedore->update($request->all());

    //     return redirect()->route('proveedores.index')
    //         ->with('success', 'Proveedore updated successfully');
    // }
    public function editar_proveedor(Proveedore  $proveedore){
        $campos_proveeedor = request()->validate([
            'Tipo_Doc_proveedor'=>'' ,
            'Documento_proveedor' =>'',
            'Nombre_proveedor'=>'' ,
            'Telefono_proveedor'=>'' ,
            'Ciudad_proveedor'=>'',
            'Direccion_proveedor'=>''
        ]);
        $proveedore->update($campos_proveeedor);
        return redirect()->route('proveedores.index') ->with('success', 'Proveedore created successfully.');
    }


    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $proveedore = Proveedore::find($id)->delete();

        return redirect()->route('proveedores.index')
            ->with('borrado', 'Proveedore deleted successfully');
    }
    public function cerrar(){
       header('Location:proveedores.index');
    }

    public function update_status(){
        $id = $_POST['id'];
        $activo = isset($_POST['Activo']);
        $campos = request()->validate([
            'estado' =>' '
        ]);
        if($activo=="Activo"){
            DB::update("UPDATE proveedores SET estado ='Inactivo' WHERE id='".$id."'");
            return redirect()->route('proveedores.index');



        }else{
            DB::update("UPDATE proveedores SET estado ='Activo' WHERE id ='".$id."'");
            return redirect()->route('proveedores.index');

        }

    }
}
