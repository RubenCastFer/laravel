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
        Schema::create('cliente', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->id('id_Cliente');
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('correo');
            $table->string('contrasenya');
            $table->string('dni');
            $table->string('telefono');
            $table->string('pais');
            $table->string('provincia');
            $table->string('ciudad');
            $table->string('cp');
            $table->string('calle');
            $table->rememberToken();
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
        Schema::dropIfExists('cliente');
    }
};
