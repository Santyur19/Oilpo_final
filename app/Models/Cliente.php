<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cliente
 *
 * @property $id
 * @property $nombre
 * @property $apellido_paterno
 * @property $apellido_materno
 * @property $telefono
 * @property $direccion
 * @property $correo
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cliente extends Model
{

    static $rules = [
        'Tipo_documento'=> 'required',
        'Documento' =>'required|unique:clientes,Documento',
        'Nombre' => 'required',
        'Apellidos'=>'required',
        'Telefono'=>'required',
        'Direccion'=>'required'
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Tipo_documento','Documento','Nombre','Apellidos','Telefono','Direccion'];



}
