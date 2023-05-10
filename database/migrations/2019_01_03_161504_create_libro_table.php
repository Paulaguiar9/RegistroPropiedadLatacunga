<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLibroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libro', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('tipo');
            $table->integer('numeroTomo');
            $table->integer('anio');

            $table->integer('partidaInicio');
            $table->integer('fojaInicio');
            $table->dateTime('fechaPartidaInicio');
            $table->integer('partidaFin');
            $table->integer('fojaFin');
            $table->dateTime('fechaPartidaFin');
            $table->string('observacion');

            $table->boolean('estado');   
            $table->string('archivo')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('libro');
    }
}
