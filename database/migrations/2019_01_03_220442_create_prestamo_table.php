<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestamoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamo', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();


            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');


            $table->unsignedInteger('libro_id');
            $table->foreign('libro_id')->references('id')->on('libro');


            $table->string('observacion')->nullable();
            $table->boolean('estado')->default(true);


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestamo');
    }
}
