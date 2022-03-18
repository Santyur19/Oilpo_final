<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    static $rules = [
        'Cliente' => 'required',
        'Documento' => 'required',
        'Fecha de compra' => 'required',
        'Cantidad' => 'required',
        'Precio' => 'required',
        'Iva' => 'required',
        'Total' => 'required',
        ];

    protected $perPage = 20;


    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [];
}
