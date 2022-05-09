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
            $table->integer('Factura');
            $table->String('Nombre');
            $table->String('Nombre_Producto')->nullable();
            $table->String('Nombre_servicio')->nullable();
            $table->String('Fecha_venta');
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
