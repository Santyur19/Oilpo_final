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
        $venta = DB:: select("SELECT DISTINCT Factura, Nombre, Fecha_venta, Total FROM ventas where Factura > 0 ");



        return view('ventas.index', compact('ventas', 'venta'))
            ->with('i', (request()->input('page', 1) - 1) * $ventas->perPage());

    }


    public function Agregar_venta(){

        date_default_timezone_set("America/Bogota");
        $fecha_actual = date("d-m-Y H:i");

        $Facturas=DB:: select("SELECT Factura FROM ventas ORDER by ID DESC LIMIT 1");
        $ventas = Venta::all();
        $clientes = Cliente::all();
        $productos=Producto::all();

        return view('ventas.Agregar_venta', compact('ventas', 'clientes', 'fecha_actual', 'productos', 'Facturas'))
            ->with('success', ' ');

    }
    public function Buscar_cliente(){

        $Nombre= $_POST['Nombre'];

        if(!empty($Nombre)){
            $documento= DB:: select("SELECT Documento from clientes where Nombre=$Nombre");
        }

        date_default_timezone_set("America/Bogota");
        $fecha_actual = date("Y-m-d");

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
        if ($Cliente != " "){
            $Fecha=$_POST['Fecha_compra'];
            $total = $_POST['Total'];
            $Producto = $_POST['producto'];
            $Precio = $_POST['precio'];
            $Iva = $_POST['iva'];
            $Cantidad = $_POST['Cantidad'];
            $factura = $_POST['factura'];

            $cadena_u="";
            $cadena= "INSERT INTO ventas (Nombre, Nombre_servicio, Fecha_venta, Total, Nombre_Producto, Cantidad, Iva, factura) VALUES ";
            for ($i = 0; $i <count($Producto); $i++){
                $cadena.="('".$Cliente."',  '".$Cliente."', '".$Fecha."',  '".$total."',  '".$Producto[$i]."' , '".$Cantidad[$i]."', '".$Iva[$i]."', '".$factura."'),";
                $cadena_update= "UPDATE productos SET Cantidad_Producto = ( SELECT Cantidad_Producto - $Cantidad[$i]) WHERE Nombre_Producto = '$Producto[$i]';";

            }
            $cadena_final = substr($cadena, 0, -1);
            $cadena_final.=";";

            // $cadena_update = substr($cadena_u, 0, -1);

            DB::insert($cadena_final);
            DB::update($cadena_update);


            return redirect('ventas/')
                ->with('success', ' ');
        }
        else{

        $ventas = Venta::paginate();
        $venta = DB:: select("SELECT DISTINCT Factura, Nombre, Fecha_venta, Total FROM ventas where Factura > 0 ");

        return redirect('ventas')
            ->with('Error', ' ');
        }
    }

    public function Detalles(){


        $Factura = $_POST['Factura'];

        $ventas = DB:: select("SELECT *  FROM ventas WHERE Factura ='".$Factura."'");

        return view('ventas.Detalles_ventas', compact('ventas'));


    }
}

