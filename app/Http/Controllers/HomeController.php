<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Variable para el permiso en las vistas ---------------------------------------------------------------------------------
        $role=auth()->user()->roles[0]->id;
        $Permiso_consulta=DB::Select("SELECT permission_id as permiso FROM role_has_permissions WHERE role_id = $role");



        foreach ($Permiso_consulta as $permisos){

            $Permiso_inicial[]= array ("permiso" => $permisos->permiso);
        }
        $rol=Json_encode($Permiso_inicial);
        //------------------------------------------------------------------------------------------------------------------------
        return view('admin.index', compact('rol'));
    }
}
