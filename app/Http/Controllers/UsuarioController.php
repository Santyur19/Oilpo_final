<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class UsuarioController
 * @package App\Http\Controllers
 */
class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::paginate();

        return view('usuario.index', compact('usuarios'))
            ->with('i', (request()->input('page', 1) - 1) * $usuarios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     $usuario = new Usuario();
    //     return view('usuario.create', compact('usuario'));
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     request()->validate(Usuario::$rules);

    //     $usuario = Usuario::create($request->all());

    //     return redirect()->route('usuarios.index')
    //         ->with('success', 'Usuario created successfully.');
    // }

    public function usuario_guardar(){
        $campos = request()->validate([
            'Documento' =>'required|unique:usuarios,Documento',
            'Nombres'=> 'required',
            'Apellidos' => 'required' ,
            'Correo'=> 'required|unique:usuarios,Correo',
            'Usuario' => 'required|unique:usuarios,Usuario',
            'Password'=> 'required|min:8'
        ]);

        Usuario::create($campos);
        return redirect()->route('usuarios.index') ->with('success', 'El producto se ha guardado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = Usuario::find($id);

        return view('usuario.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     $usuario = Usuario::find($id);

    //     return view('usuario.edit', compact('usuario'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Usuario $usuario
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Usuario $usuario)
    // {
    //     request()->validate(Usuario::$rules);

    //     $usuario->update($request->all());

    //     return redirect()->route('usuarios.index')
    //         ->with('success', 'Usuario updated successfully');
    // }

    public function editar_usuario(Usuario  $usuario){
        $campos = request()->validate([
            'Documento' =>'required',
            'Nombres'=> 'required',
            'Apellidos' => 'required',
            'Correo' => 'required',
            'Usuario' => 'required',
            'Password' => 'required'

        ]);
        $usuario->update($campos);
        return redirect()->route('usuarios.index')->with('success', 'Usuario updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    // public function destroy($id)
    // {
    //     $usuario = Usuario::find($id)->delete();

    //     return redirect()->route('usuarios.index')
    //         ->with('borrado', 'Usuario deleted successfully');
    // }

    public function update_status(){
        $id = $_POST['id'];
        $activo = isset($_POST['Activo']);
        $campos = request()->validate([
            'estado' =>' '
        ]);
        if($activo=="Activo"){
            DB::update("UPDATE usuarios SET estado ='Inactivo' WHERE id='".$id."'");
            return redirect()->route('usuarios.index');



        }else{
            DB::update("UPDATE usuarios SET estado ='Activo' WHERE id ='".$id."'");
            return redirect()->route('usuarios.index');

        }





    }
}
