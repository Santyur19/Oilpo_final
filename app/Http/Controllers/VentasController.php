<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;


class VentasController extends Controller
{
    public function index()
    {
        return view('ventas.index');
    }


    public function Agregar_producto_venta()
    {

        return view('ventas.index');
    }
}
