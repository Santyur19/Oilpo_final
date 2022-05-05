<?php

namespace App\Exports;

use App\Models\Venta;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;

class ventas implements FromCollection
{
    use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Venta::Select("id","Factura","Nombre","Nombre_Producto","Nombre_servicio","Fecha_venta","Cantidad","Iva")->get();
    }
}
