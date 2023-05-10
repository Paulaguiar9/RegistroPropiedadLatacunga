<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            

            $table->string('perfil')->nullable();
            $table->string('nombres')->nullable()->default('nombres');
            $table->string('apellidos')->nullable()->default('apellidos');
            $table->string('cedula')->nullable()->default('cedula');
            $table->string('telefono')->nullable()->default('telefono');
            $table->string('direccion')->nullable()->default('direccion');
            $table->boolean('sexo')->nullable()->default(true);
            $table->integer('edad')->nullable()->default(0);
            $table->boolean('estado')->nullable()->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
