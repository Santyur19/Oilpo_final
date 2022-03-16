<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compras extends Model
{
    static $rules = [
		'Cantidad' => 'required',
    ];

    protected $perPage = 20;


    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [];
}
