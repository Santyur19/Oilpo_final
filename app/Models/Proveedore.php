<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Proveedore
 *
 * @property $id
 * @property $Tipo_Doc_proveedor
 * @property $Documento_proveedor
 * @property $Nombre_proveedor
 * @property $Telefono_proveedor
 * @property $Ciudad_proveedor
 * @property $Direccion_proveedor
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Proveedore extends Model
{
    
    static $rules = [
		'Tipo_Doc_proveedor' => 'required',
		'Documento_proveedor' => 'required',
		'Nombre_proveedor' => 'required',
		'Telefono_proveedor' => 'required',
		'Ciudad_proveedor' => 'required',
		'Direccion_proveedor' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Tipo_Doc_proveedor','Documento_proveedor','Nombre_proveedor','Telefono_proveedor','Ciudad_proveedor','Direccion_proveedor'];



}
