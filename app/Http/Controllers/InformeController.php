<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Compras;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;

class InformeController extends Controller
{
    public function index(){
        abort_if(Gate::denies('Informe_ventas'), 403);

        //INFORME DE VENTAS
        DB::statement("SET lc_time_names = 'es_MX'");
        $ventas = DB::select("SELECT DISTINCT MonthName(Fecha_venta) AS Mes, MONTH(Fecha_venta) AS MONTH, COUNT(*) AS Numero_ventas FROM ventas WHERE MonthName(Fecha_venta) IS NOT NULL GROUP BY MONTH, MES DESC");
        $data = [];

        foreach ($ventas as $venta) {
            $data['label'][] = $venta->Mes;

            $data['data'][] = $venta->Numero_ventas;
        }
        $data['data'] = json_encode($data);

        //INFORME DE COMPRAS
        DB::statement("SET lc_time_names = 'es_MX'");
        $compras = DB::select("SELECT DISTINCT Fecha_compra, MonthName(Fecha_compra) AS MONTH, COUNT(*) AS Numero_compras FROM compras WHERE MonthName(Fecha_compra) IS NOT NULL GROUP BY Fecha_compra");


        $data_compras = [];

        foreach ($compras as $compra) {
            $data_compras['label_compras'][] = $compra->MONTH;

            $data_compras['data_compras'][] = $compra->Numero_compras;
        }
        $data_compras['data_compras'] = json_encode($data_compras);

        return view('informes.index', $data, $data_compras);
    }

    public function informe_ventas(){
        // $ventas = DB::select("SELECT COUNT(id) AS NumberOfProducts FROM ventas;");
        DB::statement("SET lc_time_names = 'es_MX'");
        $Año = DB::select("SELECT DISTINCT YEAR(Fecha_venta) AS Año FROM ventas");
        $ventas = DB::select("SELECT DISTINCT MonthName(Fecha_venta) AS Mes, MONTH(Fecha_venta) AS MONTH, COUNT(*) AS Numero_ventas FROM ventas WHERE MonthName(Fecha_venta) IS NOT NULL GROUP BY MONTH, MES DESC");
        $data = [];

        foreach ($ventas as $venta) {
            $data['label'][] = $venta->Mes;

            $data['data'][] = $venta->Numero_ventas;
        }
        $data['data'] = json_encode($data);
        return view('informes.informe_ventas ', compact('Año'), $data);
    }

    public function informe_compras(){
        //$compras = Compras::all();
        DB::statement("SET lc_time_names = 'es_MX'");
        $compras = DB::select("SELECT DISTINCT MonthName(Fecha_compra) AS MONTH, COUNT(*) AS Numero_compras FROM compras WHERE MonthName(Fecha_compra) IS NOT NULL GROUP BY Fecha_compra");


        $data = [];

        foreach ($compras as $compra) {
            $data['label'][] = $compra->MONTH;

            $data['data'][] = $compra->Numero_compras;
        }
        $data['data'] = json_encode($data);


        return view('informes.informe_compras', $data);
    }
}

