<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Compra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('Nombre_proveedor')->nullable();
            $table->integer('Numero_factura');
            $table->date('Fecha_compra');
            $table->string('Foto')->nullable();
            $table->string('Producto');
            $table->integer('Precio_compra');
            $table->integer('Total');
            $table->integer('Precio_venta');
            $table->integer('Cantidad');
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
        Schema::dropIfExists('compras');

    }
}
