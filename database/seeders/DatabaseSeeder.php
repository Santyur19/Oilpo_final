<?php

namespace Database\Seeders;
use App\Models\Compras;
use App\Models\ciudades;
use App\Models\Proveedore;
use App\Models\User;
use App\Models\Venta;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);

    //SEEDERS FACTURA VENTA

    $factura = new Venta();
    $factura->Factura = 0;
    $factura->Nombre = "";
    $factura->Nombre_Producto = "";
    $factura->Nombre_servicio = "";
    $factura->Fecha_venta = "";
    $factura->Cantidad = 0;
    $factura->Iva = 0;
    $factura->Total = 0;
    $factura ->save();


    //SEEDERS DE NUMERO DE COMPRAS
    // $numero_copmra = new Compras();
    // $numero_copmra->Nombre_proveedor = "";
    // $numero_copmra->Numero_factura = 0;
    // //$numero_copmra->Fecha_compra = "";
    // $numero_copmra->Foto = "";
    // $numero_copmra->Producto = "";
    // $numero_copmra->Precio_Compra = 0;
    // $numero_copmra->Total = 0;
    // $numero_copmra->Precio_venta = 0;
    // $numero_copmra->Cantidad = 0;
    // $numero_copmra->Numero_compras = 0;
    // $numero_copmra->save();




    //SEEDERS DEL PROVEEDOR

    $proveedor = new Proveedore();
    $proveedor->Tipo_Doc_proveedor = "NIT";
    $proveedor->Documento_proveedor = "10023747499";
    $proveedor->Nombre_proveedor = "YAMAHA";
    $proveedor->Telefono_proveedor = "3136784903";
    $proveedor->Ciudad_proveedor = "Springfield";
    $proveedor->Direccion_proveedor = "avenida siempre viva 742";
    $proveedor->save();

    //SEEDERS CIUDADES

	$ciudad = new ciudades();
        $ciudad->Nombre = 'Armenia';
        $ciudad->save();

        $ciudad = new ciudades();
        $ciudad->Nombre = 'Barrancabermeja';
        $ciudad->save();

        $ciudad = new ciudades();
        $ciudad->Nombre = 'Barranquilla';
        $ciudad->save();

        $ciudad = new ciudades();
        $ciudad->Nombre = 'Bogotá';
        $ciudad->save();

        $ciudad = new ciudades();
        $ciudad->Nombre = 'Bucaramanga';
        $ciudad->save();

        $ciudad = new ciudades();
        $ciudad->Nombre = 'Buga';
        $ciudad->save();

        $ciudad = new ciudades();
        $ciudad->Nombre = 'Cali';
        $ciudad->save();


        $ciudad = new ciudades();
        $ciudad->Nombre = 'Cartagena';
        $ciudad->save();


        $ciudad = new ciudades();
        $ciudad->Nombre = 'Duitama';
        $ciudad->save();


        $ciudad = new ciudades();
        $ciudad->Nombre = 'Florencia';
        $ciudad->save();

        $ciudad = new ciudades();
        $ciudad->Nombre = 'Fusagasugá';
        $ciudad->save();

        $ciudad = new ciudades();
        $ciudad->Nombre = 'Girardot';
        $ciudad->save();

        $ciudad = new ciudades();
        $ciudad->Nombre = 'Honda';
        $ciudad->save();

        $ciudad = new ciudades();
        $ciudad->Nombre = 'Ibagué';
        $ciudad->save();

        $ciudad = new ciudades();
        $ciudad->Nombre = 'Ipiales';
        $ciudad->save();

        $ciudad = new ciudades();
        $ciudad->Nombre = 'Jamundí';
        $ciudad->save();

        $ciudad = new ciudades();
        $ciudad->Nombre = 'Leticia';
        $ciudad->save();

        $ciudad = new ciudades();
        $ciudad->Nombre = 'Manizales';
        $ciudad->save();

        $ciudad = new ciudades();
        $ciudad->Nombre = 'Mariquita';
        $ciudad->save();

        $ciudad = new ciudades();
        $ciudad->Nombre = 'Medellín';
        $ciudad->save();

        $ciudad = new ciudades();
        $ciudad->Nombre = 'Mompox';
        $ciudad->save();

        $ciudad = new ciudades();
        $ciudad->Nombre = 'Montería';
        $ciudad->save();

        $ciudad = new ciudades();
        $ciudad->Nombre = 'Murillo';
        $ciudad->save();

        $ciudad = new ciudades();
        $ciudad->Nombre = 'Neiva';
        $ciudad->save();

        $ciudad = new ciudades();
        $ciudad->Nombre = 'Pamplona';
        $ciudad->save();

        $ciudad = new ciudades();
        $ciudad->Nombre = 'Pasto';
        $ciudad->save();

        $ciudad = new ciudades();
        $ciudad->Nombre = 'Pereira';
        $ciudad->save();

        $ciudad = new ciudades();
        $ciudad->Nombre = 'Popayán';
        $ciudad->save();

        $ciudad = new ciudades();
        $ciudad->Nombre = 'Riohacha';
        $ciudad->save();

        $ciudad = new ciudades();
        $ciudad->Nombre = 'San Andrés y Providencia';
        $ciudad->save();

        $ciudad = new ciudades();
        $ciudad->Nombre = 'San Antero';
        $ciudad->save();

        $ciudad = new ciudades();
        $ciudad->Nombre = 'Santa Marta';
        $ciudad->save();

        $ciudad = new ciudades();
        $ciudad->Nombre = 'Santafé de Antioquia';
        $ciudad->save();

        $ciudad = new ciudades();
        $ciudad->Nombre = 'Sevilla';
        $ciudad->save();

        $ciudad = new ciudades();
        $ciudad->Nombre = 'Sincelejo';
        $ciudad->save();

        $ciudad = new ciudades();
        $ciudad->Nombre = 'Sogamoso';
        $ciudad->save();

        $ciudad = new ciudades();
        $ciudad->Nombre = 'Tabio';
        $ciudad->save();

        $ciudad = new ciudades();
        $ciudad->Nombre = 'Tocancipá';
        $ciudad->save();

        $ciudad = new ciudades();
        $ciudad->Nombre = 'Tolú';
        $ciudad->save();

        $ciudad = new ciudades();
        $ciudad->Nombre = 'Tuluá';
        $ciudad->save();

        $ciudad = new ciudades();
        $ciudad->Nombre = 'Tumaco';
        $ciudad->save();

        $ciudad = new ciudades();
        $ciudad->Nombre = 'Tunja';
        $ciudad->save();

        $ciudad = new ciudades();
        $ciudad->Nombre = 'Valledupar';
        $ciudad->save();

        $ciudad = new ciudades();
        $ciudad->Nombre = 'Villavicencio';
        $ciudad->save();

        $ciudad = new ciudades();
        $ciudad->Nombre = 'Yopal';
        $ciudad->save();

        $ciudad = new ciudades();
        $ciudad->Nombre = 'Zipaquirá';
        $ciudad->save();

    }
}
