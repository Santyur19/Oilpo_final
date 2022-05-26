<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

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
        abort_if(Gate::denies('Usuario_crear'), 403);
        $usuarios = User::all();
        $roles = Role::all()->pluck('name', 'id');

        return view('usuario.index', compact('usuarios','roles'))
            // ->with('i', (request()->input('page', 1) - 1) * $usuarios->perPage());
            ;
    }
    public function create()
    {
        abort_if(Gate::denies('Usuario_crear'), 403);
        // abort_if(Gate::denies('user_create'), 403);
        $roles = Role::all()->pluck('name', 'id');
        return view('usuario.create', compact('roles'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'roles' => 'required'
        ]);
        $usuario = User::create($request->only('name', 'username', 'email')
            + [
                'password' => bcrypt($request->input('password')),
            ]);

        $roles = $request->input('roles', []);
        $usuario->syncRoles($roles);
        $usuarios = User::paginate();
        $roles = Role::all()->pluck('name', 'id');

        return redirect()->route('usuarios.index', compact('usuarios','roles'))->with('success', ' ');
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



    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $usuario = Usuario::find($id);

    //     return view('usuario.show', compact('usuario'));
    // }
    

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


    public function edit(Request $request, User $usuario){
        //$user=User::findOrFail($id);
        $data = $request->only('name', 'username', 'email');
        //  $password=$request->input('password');
        //  if($password)
        //      $data['password'] = bcrypt($password);
        //  // if(trim($request->password)=='')
        //  // {
        //  //     $data=$request->except('password');
        //  // }
        //  // else{
        //  //     $data=$request->all();
        //  //     $data['password']=bcrypt($request->password);
        //  // }
        $usuario->update($data);

        $roles = $request->input('roles', []);
        $usuario->syncRoles($roles);
        return redirect()->route('usuarios.index')->with('success', ' ');
    }

    public function editar_usuario($id){

        
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
        abort_if(Gate::denies('Editar_estado_usuario'), 403);
        $id = $_POST['id'];
        $activo = isset($_POST['Activo']);
        $campos = request()->validate([
            'estado' =>' '
        ]);
        if($activo=="Activo"){
            DB::update("UPDATE users SET estado ='Inactivo' WHERE id='".$id."'");
            return redirect()->route('usuarios.index');
        }else{
            DB::update("UPDATE users SET estado ='Activo' WHERE id ='".$id."'");
            return redirect()->route('usuarios.index');

        }
    }


    public function volver_usuario(){
        return redirect ('usuarios');
    }
}
