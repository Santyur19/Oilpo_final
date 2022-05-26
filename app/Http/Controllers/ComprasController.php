<?php

namespace App\Http\Controllers;
use App\Models\Compras;
use Illuminate\Http\Request;
use App\Models\Proveedore;
use App\Models\Producto;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use App\Exports\comprasExport;
use Maatwebsite\Excel\Facades\Excel;

class ComprasController extends Controller
{
    public function index()

    {
        abort_if(Gate::denies('Agregar_compra'), 403);
        $minimos=DB::Select("SELECT min(Fecha_compra) AS Fecha_compra FROM compras where Numero_factura > 0");
        $maximos=DB::Select("SELECT max(Fecha_compra) AS Fecha_compra FROM compras where Numero_factura > 0");

        $todo = DB::Select("SELECT COUNT(*) AS todo FROM compras");
        foreach ($todo as $todos){ $todo=$todos->todo; }

        foreach ($minimos as $minimo){$Fecha_minima=$minimo->Fecha_compra;}
        foreach ($maximos as $maximo){$Fecha_maxima=$maximo->Fecha_compra;}

        $compra = Compras::paginate(5);
        $nombre = DB:: select("SELECT DISTINCT Numero_factura, p.Nombre_proveedor, Fecha_compra, Total FROM compras  as c JOIN proveedores as p  WHERE c.Nombre_proveedor=p.id");


        return view('compras.index', compact('compra', 'nombre', 'Fecha_minima', 'Fecha_maxima', 'todo'))
            ->with('i', (request()->input('page', 1) - 1) * $compra->perPage());

    }

    public function detalle(){
        abort_if(Gate::denies('Detalles'), 403);

        $Numero_factura = $_POST['Numero_factura'];
        $Total = $_POST['Total'];
        $detalles = DB:: select("SELECT `Producto`, `Precio_compra`, `Cantidad`, `Numero_factura`, Fecha_compra, `Foto`, Total  FROM `compras` WHERE `Numero_factura`='".$Numero_factura."'");
        return view('compras.detalles', compact('detalles', 'Numero_factura', 'Total'));



    }


    public function show()

    {
        abort_if(Gate::denies('Detalles'), 403);
        $proveedores = DB::select("SELECT Nombre_proveedor, id FROM proveedores WHERE estado = 'Activo' ");
        $compra = Compras::all();
        $numero_facturas = DB:: select("SELECT Numero_compras FROM Compras ORDER by ID DESC LIMIT 1");
        $productos = DB::select("SELECT Nombre_Producto FROM productos WHERE estado ='Activo'");
        return view('compras.Agregar_compra', compact('compra', 'proveedores', 'productos', 'numero_facturas'));
    }


    public function Agregar_producto_compra(){
        abort_if(Gate::denies('Agregar_producto_compra'), 403);

        return redirect('compras/Agregar_compra')
            ->with('success', ' ');

    }

    public function destroy($id)
    {
        abort_if(Gate::denies('Agregar_compra'), 403);
        $compra = Compras::find($id)->delete();

        return redirect('compras/Agregar_compra')
            ->with('borrado', 'Proveedore deleted successfully');
    }

    public function Agregar_compra(Request  $request){
        abort_if(Gate::denies('Agregar_compra'), 403);

        request()->validate(Compras::$rules);
        $productos = Producto::all();
        $Numero_compra = $_POST['Numero_compras'];
        $proveedor = $_POST['Nombre_proveedor'];
        $numero_factura = $_POST['Numero_factura'];
        $foto=(isset($_FILES['Foto']['name']))?$_FILES['Foto']['name']:"";
        $fecha_compra = $_POST['Fecha_compra'];


        if ($request->hasFile('Foto')) {
            $filenameWithExt = $request->file('Foto')->getClientOriginalName ();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('Foto')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = $filename.'_'. time().'.'.$extension;
            $path = $request->file('Foto')->move('img/detalles_compras/', $fileNameToStore);

            $total = $_POST['Total'];
            $Producto = $_POST['Productos'];
            $Precio_venta = $_POST['Precios_venta'];
            $Precio_compra = $_POST['Precios_compra'];
            $Cantidad = $_POST['Cantidades'];

            $cadena= "INSERT INTO compras (Numero_compras, Nombre_proveedor, Numero_factura, Fecha_compra, Foto, Total,  Producto, Precio_compra, Precio_venta, Cantidad) VALUES ";
            for ($i = 0; $i <count($Producto); $i++){

                //UPDATE CANTIDAD PRODUCTOS

                $cadena_update= "UPDATE productos SET Cantidad_Producto = ( SELECT Cantidad_Producto + $Cantidad[$i]) WHERE Nombre_Producto = '$Producto[$i]';";
                DB::update($cadena_update);

                //UPDATE PRECIO DE VENTA PRODUCTOS

                $cadena_update= "UPDATE productos SET Valor_venta =  $Precio_venta[$i] WHERE Nombre_Producto = '$Producto[$i]';";
                DB::update($cadena_update);

                //UPDATE PRECIO DE COMPRA PRODUCTOS

                $cadena_update= "UPDATE productos SET Valor_compra =  $Precio_compra[$i]  WHERE Nombre_Producto = '$Producto[$i]';";
                DB::update($cadena_update);

                $cadena.="('".$Numero_compra."', '".$proveedor."',  '".$numero_factura."',  '".$fecha_compra."', '".$fileNameToStore."',  '".$total."' , '".$Producto[$i]."', '".$Precio_compra[$i]."', '".$Precio_venta[$i]."', '".$Cantidad[$i]."'),";


            }
            $cadena_final = substr($cadena, 0, -1);
            $cadena_final.=";";
            DB::insert($cadena_final);

            return redirect('compras/')
                ->with('success', ' ', $productos);
            }

        else {

        $fileNameToStore = 'noimage.jpg';
        $total = $_POST['Total'];
            $Producto = $_POST['Productos'];
            $Precio_venta = $_POST['Precios_venta'];
            $Precio_compra = $_POST['Precios_compra'];
            $Cantidad = $_POST['Cantidades'];

            $cadena= "INSERT INTO compras (Numero_compras, Nombre_proveedor, Numero_factura, Fecha_compra, Foto, Total,  Producto, Precio_compra, Precio_venta, Cantidad) VALUES ";
            for ($i = 0; $i <count($Producto); $i++){

                //UPDATE CANTIDAD PRODUCTOS

                $cadena_update= "UPDATE productos SET Cantidad_Producto = ( SELECT Cantidad_Producto + $Cantidad[$i]) WHERE Nombre_Producto = '$Producto[$i]';";
                DB::update($cadena_update);

                //UPDATE PRECIO DE VENTA PRODUCTOS

                $cadena_update= "UPDATE productos SET Valor_venta =  $Precio_venta[$i] WHERE Nombre_Producto = '$Producto[$i]';";
                DB::update($cadena_update);

                //UPDATE PRECIO DE COMPRA PRODUCTOS

                $cadena_update= "UPDATE productos SET Valor_compra =  $Precio_compra[$i]  WHERE Nombre_Producto = '$Producto[$i]';";
                DB::update($cadena_update);

                $cadena.="('".$Numero_compra."', '".$proveedor."',  '".$numero_factura."',  '".$fecha_compra."', '".$fileNameToStore."',  '".$total."' , '".$Producto[$i]."', '".$Precio_compra[$i]."', '".$Precio_venta[$i]."', '".$Cantidad[$i]."'),";


            }
            $cadena_final = substr($cadena, 0, -1);
            $cadena_final.=";";
            DB::insert($cadena_final);

            return redirect('compras/')
                ->with('success', ' ', $productos);

        }

    }

    public function volver_compra(){
        return redirect ('compras');
    }

    public function exportar_excel()
    {
        date_default_timezone_set("America/Bogota");
        $fecha_actual = date("Y-m-d H:i");


        $Desicion=$_POST['Desicion'];

        $Valores = DB:: select("SELECT if( COUNT(DISTINCT(Numero_factura))>1,1,0) as CONTADOR FROM compras");

        header("Content-Type: application/xls");
        header("Content-Disposition: attachment; filename=Compras ". $fecha_actual .".xls");
        header("Pragma: no-cache");
        header("Expires: 0");

        $tabla = "";

        $tabla .="
        <table>
            <thead>
                <tbody>
                    <tr>
                        <th>Factura</th>
                        <th>proveedor</th>
                        <th>Fecha de compra</th>
                        <th>Total</th>
                    </tr>
        ";

        foreach ($Valores as $valores)

        if ($valores->CONTADOR==1){

            if ($Desicion=="Todo"){

                date_default_timezone_set("America/Bogota");
                $fecha_actual = date("Y-m-d H:i");
                header("Content-Type: application/xls");
                header("Content-Disposition: attachment; filename=Compras ". $fecha_actual .".xls");
                header("Pragma: no-cache");
                header("Expires: 0");
                
                $compras = DB:: select("SELECT DISTINCT Numero_factura, p.Nombre_proveedor, Fecha_compra, Total FROM compras  as c JOIN proveedores as p  WHERE c.Nombre_proveedor=p.id ");
               
                // $Ventas = DB:: select("SELECT DISTINCT Factura, Nombre, Nombre_Producto, Nombre_servicio, Fecha_venta, Cantidad, Iva,  Total FROM Ventas  BETWEEN $Fecha_minima and $Fecha_maxima");

                foreach ($compras as $compra) {
                    $tabla .="
                            <tr>
                                <td>".$compra->Numero_factura."</td>
                                <td>".$compra->Nombre_proveedor."</td>
                                <td>".$compra->Fecha_compra."</td>
                                <td>".$compra->Total."</td>
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
                $compras = DB:: select("SELECT DISTINCT Numero_factura, p.Nombre_proveedor, Fecha_compra, Total FROM compras  as c JOIN proveedores as p  WHERE Fecha_compra BETWEEN '$Fecha_minima' AND '$Fecha_maxima' AND c.Nombre_proveedor=p.id ");

                foreach ($compras as $compra) {
                    $tabla .="
                    <td>".$compra->Numero_factura."</td>
                    <td>".$compra->Nombre_proveedor."</td>
                    <td>".$compra->Fecha_compra."</td>
                    <td>".$compra->Total."</td>
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
            return redirect('compras/')
                ->with('Vacio', ' ');
        }
        // return Excel::download(new ventas, 'Ventas '.$fecha_actual.'.csv');
    }
}

