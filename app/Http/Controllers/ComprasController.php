<?php

namespace App\Http\Controllers;
use App\Models\Compras;
use Illuminate\Http\Request;
use App\Models\Proveedore;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;
use App\Exports\comprasExport;
use Maatwebsite\Excel\Facades\Excel;

class ComprasController extends Controller
{
    public function index()

    {
        $compra = Compras::paginate();
        $nombre = DB:: select("SELECT DISTINCT Numero_factura, p.Nombre_proveedor, Fecha_compra, Total FROM compras  as c JOIN proveedores as p  WHERE c.Nombre_proveedor=p.id");


        return view('compras.index', compact('compra', 'nombre'))
            ->with('i', (request()->input('page', 1) - 1) * $compra->perPage());

    }

    public function detalle(){

        $Numero_factura = $_POST['Numero_factura'];
        $Total = $_POST['Total'];
        $detalles = DB:: select("SELECT `Producto`, `Precio_compra`, `Cantidad`, `Numero_factura`, Fecha_compra, `Foto`, Total  FROM `compras` WHERE `Numero_factura`='".$Numero_factura."'");
        return view('compras.detalles', compact('detalles', 'Numero_factura', 'Total'));



    }


    public function show()

    {

        $proveedores = Proveedore::all();
        $compra = Compras::paginate();
        $productos = Producto::all();
        return view('compras.Agregar_compra', compact('compra', 'proveedores', 'productos'))
            ->with('i', (request()->input('page', 1) - 1) * $compra->perPage());
    }


    public function Agregar_producto_compra(){

        return redirect('compras/Agregar_compra')
            ->with('success', ' ');

    }

    public function destroy($id)
    {
        $compra = Compras::find($id)->delete();

        return redirect('compras/Agregar_compra')
            ->with('borrado', 'Proveedore deleted successfully');
    }

    public function Agregar_compra(Request  $request){

        $proveedor = $_POST['Nombre_proveedor'];
        $numero_factura = $_POST['Numero_factura'];
        $foto=(isset($_FILES['Foto']['name']))?$_FILES['Foto']['name']:"";
        $fecha_compra = $_POST['Fecha_compra'];
        // //IMAGEN
        // if($request->hasFile('Foto')){
        //     $foto=$request->file('Foto')->store('uploads', 'public');

        // }

        if ($request->hasFile('Foto')) {
            $filenameWithExt = $request->file('Foto')->getClientOriginalName ();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('Foto')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = $filename.'_'. time().'.'.$extension;
            $path = $request->file('Foto')->storeAs('public/image', $fileNameToStore);
            }
            // Else add a dummy image
            else {
            $fileNameToStore = 'noimage.jpg';
            }



          // //END IMAGEN
        $total = $_POST['Total'];
        $Producto = $_POST['Producto'];
        $Precio_compra = $_POST['Precio_compra'];
        $Precio_venta = $_POST['Precio_venta'];
        $Cantidad = $_POST['Cantidad'];

        $cadena= "INSERT INTO compras (Nombre_proveedor, Numero_factura, Fecha_compra, Foto, Total,  Producto, Precio_compra, Precio_venta, Cantidad) VALUES ";
        for ($i = 0; $i <count($Producto); $i++){
            $cadena.="('".$proveedor."',  '".$numero_factura."',  '".$fecha_compra."', '".$foto."',  '".$total."' , '".$Producto[$i]."', '".$Precio_compra[$i]."', '".$Precio_venta[$i]."', '".$Cantidad[$i]."'),";

        }
        $cadena_final = substr($cadena, 0, -1);
        $cadena_final.=";";
        DB::insert($cadena_final);

        return redirect('compras/')
            ->with('success', ' ');


    }

    public function exportar_excel()
    {
        return Excel::download(new ComprasExport, 'compras.xlsx');
    }


}
