<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Servicio
 *
 * @property $id
 * @property $nombre
 * @property $valor
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Servicio extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'valor' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','valor'];



}
