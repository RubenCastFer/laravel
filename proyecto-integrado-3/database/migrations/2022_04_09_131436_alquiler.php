<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alquiler', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->id('id_Alquiler');
            $table->foreignId('id_Cliente');
            $table->foreignId('id_Coche');
            $table->decimal('precio_total', $precision = 8, $scale = 2);
            $table->dateTime('fecha_contrato');
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin');
            $table->string('observacion')->nullable();
            $table->string('estado');
            $table->timestamps();

            $table->foreign('id_Cliente')->references('id_cliente')->on('cliente')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_Coche')->references('id_coche')->on('coche')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alquiler');
        
    }
};
