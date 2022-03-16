<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 *
 * @property $id
 * @property $Nombre_Producto
 * @property $Valor_Producto
 * @property $Cantidad_Producto
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Producto extends Model
{
    
    static $rules = [
		'Nombre_Producto' => 'required',
		'Valor_Producto' => 'required',
		'Cantidad_Producto' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Nombre_Producto','Valor_Producto','Cantidad_Producto'];



}
