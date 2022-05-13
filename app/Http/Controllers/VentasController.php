<?php

namespace App\Http\Controllers;


use function Psy\bin;
use App\Models\Venta;
use App\Models\Cliente;
use App\Models\Servicio;
use App\Models\Producto;
use App\Exports\ventas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;


class VentasController extends Controller
{
    public function index()

    {

        $ventas = Venta::paginate();
        $minimos=DB::Select("SELECT min(Fecha_venta) AS Fecha_venta FROM ventas where Factura > 0");
        $maximos=DB::Select("SELECT max(Fecha_venta) AS Fecha_venta FROM ventas where Factura > 0");
        $venta = DB:: select("SELECT DISTINCT Factura, Nombre, Fecha_venta, Total FROM ventas where Factura > 0 ");

        foreach ($minimos as $minimo){$Fecha_minima=$minimo->Fecha_venta;}
        foreach ($maximos as $maximo){$Fecha_maxima=$maximo->Fecha_venta;}

        return view('ventas.index', compact('ventas', 'venta', 'Fecha_minima', 'Fecha_maxima'))
            ->with('i', (request()->input('page', 1) - 1) * $ventas->perPage());

    }


    public function Agregar_venta(){

        date_default_timezone_set("America/Bogota");
        $fecha_actual = date("Y-m-d");

        $Facturas=DB:: select("SELECT Factura FROM ventas ORDER by ID DESC LIMIT 1 ");
        $ventas = Venta::all();
        $clientes = DB::Select("SELECT * FROM clientes WHERE estado ='Activo' ");
        $productos=DB::Select("SELECT * FROM productos WHERE estado ='Activo' ");
        $servicios=DB::Select("SELECT * FROM servicios WHERE estado ='Activo' ");


        $precios = array();
        $i=1;
        foreach ($productos as $producto){

            $precios[]= array ("Precio_producto" => $producto->Valor_venta);
            $i++;
        }
        $precio=Json_encode($precios);

        return view('ventas.Agregar_venta', compact('ventas', 'clientes', 'fecha_actual', 'productos', 'Facturas', 'servicios', 'precio'))
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

            $Fecha=$_POST['Fecha_venta'];
            $total = $_POST['Total'];
            $Producto = $_POST['producto'];
            $Servicio = $_POST['servicio'];
            $Precio = $_POST['precio'];
            $Iva = $_POST['iva'];
            $Cantidad = $_POST['Cantidad'];
            $factura = $_POST['factura'];

            $cadena_u="";
            $cadena= "INSERT INTO ventas (Nombre, Nombre_servicio, Fecha_venta, Total, Nombre_Producto, Cantidad, Iva, factura) VALUES ";
            for ($i = 0; $i <count($Producto); $i++){
                if ($Producto[$i] != "Nada" && $Producto[$i] != "" && $Producto[$i] != "Seleccione"){
                    $minimos = DB::SELECT("SELECT CASE WHEN Cantidad_Producto - $Cantidad[$i] < 0 THEN 0 ELSE 1 END AS MINIMO FROM productos WHERE Nombre_Producto = '$Producto[$i]' ;");

                    foreach ($minimos as $minimo) {
                        if ($minimo->MINIMO == 1){
                            $cadena_update= "UPDATE productos SET Cantidad_Producto = ( SELECT Cantidad_Producto - $Cantidad[$i]) WHERE Nombre_Producto = '$Producto[$i]';";
                            DB::update($cadena_update);

                            $cadena.="('".$Cliente."',  '".$Servicio[$i]."', '".$Fecha."',  '".$total."',  '".$Producto[$i]."' , '".$Cantidad[$i]."', '".$Iva[$i]."', '".$factura."'),";
                        }else{
                            $Producto_error= $Producto[$i];
                            $venta = DB:: select("SELECT DISTINCT Factura, Nombre, Fecha_venta, Total FROM ventas where Factura > 0 ");

                            return redirect('/ventas')
                            ->with('stock', ' ');
                        }
                    }
                }
                else{
                    $cadena.="('".$Cliente."',  '".$Servicio[$i]."', '".$Fecha."',  '".$total."',  '".$Producto[$i]."' , '".$Cantidad[$i]."', '".$Iva[$i]."', '".$factura."'),";
                }
                
            }


            // <?php echo $Producto_error



            // SELECT Cantidad_Producto,
            // CASE
	        //     WHEN Cantidad_Producto - 50 < 0 THEN 0
            //     ELSE 1
            // END AS "Pepe"
            // FROM productos;




            // update ventas set Nombre_Producto='Nada' WHERE Nombre_Producto='undefined'; 
            // update ventas set Cantidad='0' WHERE Cantidad='; 
            // update ventas set iva='0' WHERE iva=''

            $cadena_final = substr($cadena, 0, -1);
            $cadena_final.=";";


            DB::insert($cadena_final);
            $Nada_iva="update ventas set iva='0' WHERE iva='';";
            $Nada_cantidad="update ventas set Cantidad='0' WHERE Cantidad='';";
            $Nada_servicio="update ventas set Nombre_servicio='Nada' WHERE Nombre_servicio='undefined'  OR Nombre_servicio='' OR Nombre_servicio='Seleccione';";
            $Nada_producto="update ventas set Nombre_Producto='Nada' WHERE Nombre_Producto='undefined'  OR Nombre_servicio='' OR Nombre_Producto='Seleccione';";
            
            DB::update($Nada_iva);
            DB::update($Nada_cantidad);
            DB::update($Nada_servicio);
            DB::update($Nada_producto);

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

        $totales = DB:: select("SELECT DISTINCT(Total), Factura FROM ventas WHERE Factura = '".$Factura."'");
        $ventas = DB:: select("SELECT *  FROM ventas WHERE Factura ='".$Factura."'");

        return view('ventas.Detalles_ventas', compact('ventas', 'totales'));


    }
    public function volver(){
        return redirect ('ventas');
    }

    public function Exportar(){
        date_default_timezone_set("America/Bogota");
        $fecha_actual = date("Y-m-d H:i");


        $Desicion=$_POST['Desicion'];

        $Valores = DB:: select("SELECT if( COUNT(DISTINCT(Factura))>1,1,0) as CONTADOR FROM ventas");

        header("Content-Type: application/xls");
        header("Content-Disposition: attachment; filename=Ventas ". $fecha_actual .".xls");
        header("Pragma: no-cache");
        header("Expires: 0");

        $tabla = "";

        $tabla .="
        <table>
            <thead>
                <tbody>
                    <tr>
                        <th>Factura</th>
                        <th>Cliente</th>
                        <th>Producto</th>
                        <th>Servicio</th>
                        <th>Fecha de venta</th>
                        <th>Cantidad</th>
                        <th>Iva</th>
                        <th>Total</th>
                    </tr>
        ";

        foreach ($Valores as $valores)

        if ($valores->CONTADOR==1){

            if ($Desicion=="Todo"){


                $Ventas = DB:: select("SELECT DISTINCT Factura, Nombre, Nombre_Producto, Nombre_servicio, Fecha_venta, Cantidad, Iva,  Total FROM Ventas WHERE Factura > 0");
                // $Ventas = DB:: select("SELECT DISTINCT Factura, Nombre, Nombre_Producto, Nombre_servicio, Fecha_venta, Cantidad, Iva,  Total FROM Ventas  BETWEEN $Fecha_minima and $Fecha_maxima");

                foreach ($Ventas as $ventas) {
                    $tabla .="
                            <tr>
                                <td>".$ventas->Factura."</td>
                                <td>".$ventas->Nombre."</td>
                                <td>".$ventas->Nombre_Producto."</td>
                                <td>".$ventas->Nombre_servicio."</td>
                                <td>".$ventas->Fecha_venta."</td>
                                <td>".$ventas->Cantidad."</td>
                                <td>".$ventas->Iva."</td>
                                <td>".$ventas->Total."</td>
                            </tr>
                    ";
                }

                $tabla .="
                        </tbody>
                    </thead>
                </table>
                ";
                echo $tabla;
            }
            else{
                $Fecha_maxima=$_POST['Fecha_maxima'];
                $Fecha_minima=$_POST['Fecha_minima'];
                $Ventas = DB:: select("SELECT DISTINCT Factura, Nombre, Nombre_Producto, Nombre_servicio, Fecha_venta, Cantidad, Iva,  Total FROM Ventas WHERE Fecha_venta BETWEEN '$Fecha_minima' AND '$Fecha_maxima' AND Factura > 0");

                foreach ($Ventas as $ventas) {
                    $tabla .="
                            <tr>
                                <td>".$ventas->Factura."</td>
                                <td>".$ventas->Nombre."</td>
                                <td>".$ventas->Nombre_Producto."</td>
                                <td>".$ventas->Nombre_servicio."</td>
                                <td>".$ventas->Fecha_venta."</td>
                                <td>".$ventas->Cantidad."</td>
                                <td>".$ventas->Iva."</td>
                                <td>".$ventas->Total."</td>                                
                            </tr>
                    ";
                }

                $tabla .="
                        </tbody>
                    </thead>
                </table>
                ";
                echo $tabla;
            }
        }
        else {
            return redirect('ventas')
                ->with('Vacio', ' ');
        }
        // return Excel::download(new ventas, 'Ventas '.$fecha_actual.'.csv');
    }
}

