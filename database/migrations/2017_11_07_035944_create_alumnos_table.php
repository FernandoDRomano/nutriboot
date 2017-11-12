<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nombre');
          $table->integer('dni')->unique();
          $table->string('direccion');
          $table->date('fechaNacimiento');
          $table->string('nombreTutor');
          //Para la llave foranea
          $table->integer('escuela_id')->unsigned();
          //Seteo diciendo que son las claves foraneas
          $table->foreign('escuela_id')->references('id')->on('escuela')->onDelete('cascade');
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
        Schema::dropIfExists('alumno');
    }
}
