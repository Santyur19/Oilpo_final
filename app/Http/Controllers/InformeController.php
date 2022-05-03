<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Compras;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InformeController extends Controller
{
    public function index(){

        //INFORME DE VENTAS
        $ventas = DB::select("SELECT DISTINCT MonthName(Fecha_venta) AS MONTH, COUNT(*) AS numRecords FROM ventas WHERE MonthName(Fecha_venta) IS NOT NULL GROUP BY MonthName(Fecha_venta) ASC");
        $data = [];

        foreach ($ventas as $venta) {
            $data['label'][] = $venta->MONTH;

            $data['data'][] = $venta->numRecords;
        }
        $data['data'] = json_encode($data);

        //INFORME DE COMPRAS
        $compras = DB::select("SELECT DISTINCT Fecha_compra, MonthName(Fecha_compra) AS MONTH, COUNT(*) AS Numero_compras FROM compras WHERE MonthName(Fecha_compra) IS NOT NULL GROUP BY Fecha_compra");


        $data_compras = [];

        foreach ($compras as $compra) {
            $data_compras['label_compras'][] = $compra->MONTH;

            $data_compras['data_compras'][] = $compra->Numero_compras;
        }
        $data_compras['data_compras'] = json_encode($data_compras);

        return view('informes.index', $data_compras, $data);
    }

    public function informe_ventas(){
        // $ventas = DB::select("SELECT COUNT(id) AS NumberOfProducts FROM ventas;");
        $ventas = DB::select("SELECT DISTINCT MonthName(Fecha_venta) AS MONTH, COUNT(*) AS numRecords FROM ventas WHERE MonthName(Fecha_venta) IS NOT NULL GROUP BY MonthName(Fecha_venta) ASC");
        $data = [];

        foreach ($ventas as $venta) {
            $data['label'][] = $venta->MONTH;

            $data['data'][] = $venta->numRecords;
        }
        $data['data'] = json_encode($data);
        return view('informes.informe_ventas ', $data);
    }

    public function informe_compras(){
        //$compras = Compras::all();
        $compras = DB::select("SELECT DISTINCT Fecha_compra, MonthName(Fecha_compra) AS MONTH, COUNT(*) AS Numero_compras FROM compras WHERE MonthName(Fecha_compra) IS NOT NULL GROUP BY Fecha_compra");


        $data = [];

        foreach ($compras as $compra) {
            $data['label'][] = $compra->MONTH;

            $data['data'][] = $compra->Numero_compras;
        }
        $data['data'] = json_encode($data);


        return view('informes.informe_compras', $data);
    }
}

