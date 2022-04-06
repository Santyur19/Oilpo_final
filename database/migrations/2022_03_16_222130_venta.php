<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Venta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('Nombre');
            $table->unsignedBigInteger('Nombre_Producto');
            $table->unsignedBigInteger('Nombre_servicio');
            $table->date('Fecha_venta');
            $table->String('Cantidad');
            $table->String('Iva');
            $table->String('Total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::dropIfExists('ventas');

    }
}
