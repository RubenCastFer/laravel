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
        Schema::create('empleado', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->id('id_Empleado');
            $table->string('name');
            $table->string('apellidos');
            $table->string('email')->unique();;
            $table->string('password');
            $table->string('dni');
            $table->string('telefono');
            $table->string('pais');
            $table->string('provincia');
            $table->string('ciudad');
            $table->string('cp');
            $table->string('calle');
            $table->string('puesto')->nullable();
            $table->rememberToken('remember_token');
            $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('empleado');
    }
};
