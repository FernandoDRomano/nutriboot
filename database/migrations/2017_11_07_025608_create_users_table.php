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
          $table->string('nombre');
          $table->string('direccion');
          $table->integer('dni');
          $table->enum('cargo',['Directora','Docente']);
          $table->string('email')->unique();
          $table->string('nombreUsuario')->unique();
          $table->string('password');
          //Son las claves foraneas
          $table->integer('perfil_id')->unsigned();
          $table->integer('escuela_id')->unsigned();
          //Seteo diciendo que son las claves foraneas
          $table->foreign('perfil_id')->references('id')->on('perfil')->onDelete('cascade');
          $table->foreign('escuela_id')->references('id')->on('escuela')->onDelete('cascade');
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
        Schema::dropIfExists('users');
    }
}
