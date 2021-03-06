<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

/**
 * Class ServicioController
 * @package App\Http\Controllers
 */
class ServicioController extends Controller
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
        abort_if(Gate::denies('guardar_Servicio'), 401);

        // Variable para el permiso en las vistas ---------------------------------------------------------------------------------
        $role=auth()->user()->roles[0]->id;
        $Permiso_consulta=DB::Select("SELECT permission_id as permiso FROM role_has_permissions WHERE role_id = $role");



        foreach ($Permiso_consulta as $permisos){

            $Permiso_inicial[]= array ("permiso" => $permisos->permiso);
        }
        $rol=Json_encode($Permiso_inicial);
        //------------------------------------------------------------------------------------------------------------------------

        $servicios = Servicio::paginate();


        return view('servicio.index', compact('servicios','rol'))
            ->with('i', (request()->input('page', 1) - 1) * $servicios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     $servicio = new Servicio();
    //     return view('servicio.create', compact('servicio'));
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     request()->validate(Servicio::$rules);

    //     $servicio = Servicio::create($request->all());

    //     return redirect()->route('servicios.index')
    //         ->with('success', 'Servicio created successfully.');
    // }

    public function servicio_guardar(){
        abort_if(Gate::denies('guardar_Servicio'), 401);
        $rol=auth()->user()->roles;

        $campos = request()->validate([
            'Nombre_servicio' =>'required|unique:servicios,Nombre_servicio',
        ]);
        Servicio::create($campos);
        return redirect()->route('servicios.index', compact('rol')) ->with('success', 'El producto se ha guardado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort_if(Gate::denies('guardar_Servicio'), 401);

        // Variable para el permiso en las vistas ---------------------------------------------------------------------------------
        $role=auth()->user()->roles[0]->id;
        $Permiso_consulta=DB::Select("SELECT permission_id as permiso FROM role_has_permissions WHERE role_id = $role");



        foreach ($Permiso_consulta as $permisos){

            $Permiso_inicial[]= array ("permiso" => $permisos->permiso);
        }
        $rol=Json_encode($Permiso_inicial);
        //------------------------------------------------------------------------------------------------------------------------

        $servicio = Servicio::find($id);

        return view('servicio.show', compact('servicio', 'rol'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     $servicio = Servicio::find($id);

    //     return view('servicio.edit', compact('servicio'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Servicio $servicio
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Servicio $servicio)
    // {
    //     request()->validate(Servicio::$rules);

    //     $servicio->update($request->all());

    //     return redirect()->route('servicios.index')
    //         ->with('success', 'Servicio updated successfully');
    // }
    public function editar_servicio(Servicio  $servicio){
        abort_if(Gate::denies('Servicio_editar'), 401);

        $campos = request()->validate([
            'Nombre_servicio' =>'required',
        ]);
        $servicio->update($campos);
        return redirect()->route('servicios.index') ->with('success', ' ');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $servicio = Servicio::find($id)->delete();

        return redirect()->route('servicios.index')
            ->with('borrado', 'Servicio deleted successfully');
    }

    public function update_status(){
        abort_if(Gate::denies('Editar_estado_servicio'), 401);
        $id = $_POST['id'];
        $activo = isset($_POST['Activo']);

        $campos = request()->validate([
            'estado' =>' '
        ]);
        if($activo=="Activo"){
            DB::update("UPDATE servicios SET estado ='Inactivo' WHERE id='".$id."'");
            return redirect()->route('servicios.index');



        }else{
            DB::update("UPDATE servicios SET estado ='Activo' WHERE id ='".$id."'");
            return redirect()->route('servicios.index');

        }
    }
}
