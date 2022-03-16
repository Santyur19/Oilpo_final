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
            $table->unsignedBigInteger('Cliente')->nullable();
            $table->date('Fecha_compra');
            $table->string('Documento');
            $table->string('Producto');
            $table->integer('Cantidad');
            $table->integer('Precio');
            $table->integer('Iva');
            $table->integer('Total');
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
