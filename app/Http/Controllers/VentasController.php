<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;
use function Psy\bin;


class VentasController extends Controller
{
    public function index()

    {
        $ventas = Venta::paginate();


        return view('ventas.index', compact('ventas'))
            ->with('i', (request()->input('page', 1) - 1) * $ventas->perPage());

    }


    public function Agregar_venta(){

        date_default_timezone_set("America/Bogota");
        $fecha_actual = date("d-m-Y H:i");

        $ventas = Venta::all();
        $clientes = Cliente::all();
        $productos=Producto::all();

        return view('ventas.Agregar_venta', compact('ventas', 'clientes', 'fecha_actual', 'productos'))
            ->with('success', ' ');

    }
    public function Buscar_cliente(){

        $Nombre= $_POST['Nombre'];

        if(!empty($Nombre)){
            $documento= DB:: select("SELECT Documento from clientes where Nombre=$Nombre");
        }

        date_default_timezone_set("America/Bogota");
        $fecha_actual = date("d-m-Y H:i");

        $ventas = Venta::all();
        $clientes = Cliente::all();
        $productos=Producto::all();

        return view('ventas.Agregar_venta', compact('ventas', 'clientes', 'fecha_actual', 'productos', 'documento'))
            ->with('success', ' ');
    }

    public function show(){

        return view('ventas.index');
    }


    public function destroy($id)
    {
        $ventas = Venta::find($id)->delete();

        return redirect('ventas/Agregar_ventas')
            ->with('borrado', 'Venta deleted successfully');
    }

    public function Guardar_venta(){

        $Cliente=$_POST['Nombre'];
        $Fecha="Hola";
        $total = $_POST['Total'];
        $Producto = $_POST['producto'];
        $Precio = $_POST['precio'];
        $Iva = $_POST['iva'];
        $Cantidad = $_POST['Cantidad'];

        $cadena= "INSERT INTO ventas (Nombre, Nombre_servicio, Fecha_venta, Total, Nombre_Producto, Cantidad, Iva) VALUES ";
        for ($i = 0; $i <count($Producto); $i++){
            $cadena.="('".$Cliente."',  '".$total."',  '".$Cliente."', '".$Fecha."',  '".$Producto[$i]."' , '".$Cantidad[$i]."', '".$Iva[$i]."'),";
        }
        $cadena_final = substr($cadena, 0, -1);
        $cadena_final.=";";
        DB::insert($cadena_final);

        return redirect('compras/')
            ->with('success', ' ');
    }

}

