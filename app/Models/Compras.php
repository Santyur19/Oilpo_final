<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compras extends Model
{
    static $rules = [
        'Nombre_proveedor' => 'required',
		'Numero_factura' => 'required',
        'Fecha_compra' => 'required',
        'Foto' => 'required',


    ];

    protected $perPage = 20;


    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [];
}
