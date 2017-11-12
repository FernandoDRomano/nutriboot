<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comida', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nombre');
          $table->string('descripcion');
          $table->integer('caloriasComida');
          //Para la llave foranea
          $table->integer('estacion_id')->unsigned();
          $table->integer('menuDiario_id')->unsigned();
          $table->integer('tipoComida_id')->unsigned();
          //Seteo diciendo que son las claves foraneas
          $table->foreign('estacion_id')->references('id')->on('estacion')->onDelete('cascade');
          $table->foreign('menuDiario_id')->references('id')->on('menuDiario')->onDelete('cascade');
          $table->foreign('tipoComida_id')->references('id')->on('tipoComida')->onDelete('cascade');
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
        Schema::dropIfExists('comida');
    }
}
