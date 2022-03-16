<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 *
 * @property $id
 * @property $usuario
 * @property $nombres
 * @property $apellidos
 * @property $correo
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Usuario extends Model
{

    static $rules = [
		'Documento',
        'Nombres',
        'Apellidos' ,
        'Correo',
        'Usuario',
        'Password'
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Documento','Nombres','Apellidos','Correo', 'Usuario', 'Password'];



}
