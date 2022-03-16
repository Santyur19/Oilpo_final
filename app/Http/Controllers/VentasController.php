<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VentasController extends Controller
{
    public function index()
    {
        return view('ventas.index');
    }


    public function Agregar_venta()
    {

        return view('ventas.Agregar_venta');
    }
}
