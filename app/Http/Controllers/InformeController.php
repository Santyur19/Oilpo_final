<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;

class InformeController extends Controller
{
    public function index(){



        return view('informes.index');
    }

    public function informe_ventas(){
        // $ventas = DB::select("SELECT COUNT(id) AS NumberOfProducts FROM ventas;");
        $ventas = Venta::all();
        $data = [];

        foreach ($ventas as $venta) {
            $data['label'][] = $venta->created_at;
            $data['data'][] = $venta->Factura;
        }
        $data['data'] = json_encode($data);
        return view('informes.informe_ventas', $data);
    }
}

