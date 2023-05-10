<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemreporteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itemreporte', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->unsignedInteger('certificado_id')->nullable();
            $table->foreign('certificado_id')->references('id')->on('certificado');

            $table->unsignedInteger('reporte_id')->nullable();
            $table->foreign('reporte_id')->references('id')->on('reporte');

            $table->unsignedInteger('distribucion_id')->nullable();
            $table->foreign('distribucion_id')->references('id')->on('distribucion');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itemreporte');
    }
}
