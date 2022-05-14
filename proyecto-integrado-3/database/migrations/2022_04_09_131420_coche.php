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
        Schema::create('coche', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->id('id_Coche');
            $table->string('bastidor');
            $table->string('marca');
            $table->string('modelo');
            $table->string('color');
            $table->string('matricula');
            $table->string('imagen')->nullable();
            $table->string('estado')->nullable();
            $table->decimal('precio', $precision = 4, $scale = 2);
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
        Schema::dropIfExists('coche');
    }
};
