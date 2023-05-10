<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistribucionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distribucion', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();


            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');


            $table->unsignedInteger('certificado_id');
            $table->foreign('certificado_id')->references('id')->on('certificado');

            $table->integer('estado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('distribucion');
    }
}
