<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro', function (Blueprint $table) {
          $table->increments('id');
          $table->date('fecha');
          $table->double('peso');
          $table->double('altura');
          $table->double('imc');
          //Para la llave foranea
          $table->integer('alumno_id')->unsigned();
          //Seteo diciendo que son las claves foraneas
          $table->foreign('alumno_id')->references('id')->on('alumno')->onDelete('cascade');
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
        Schema::dropIfExists('registro');
    }
}
