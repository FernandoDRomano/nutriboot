<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingrediente', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('cantidad');
          $table->enum('unidad',['Kg','Litro','Unidades']);
          //Son las claves foraneas
          $table->integer('insumo_id')->unsigned();
          $table->integer('comida_id')->unsigned();
          //Seteo diciendo que son las claves foraneas
          $table->foreign('insumo_id')->references('id')->on('insumo')->onDelete('cascade');
          $table->foreign('comida_id')->references('id')->on('comida')->onDelete('cascade');
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
        Schema::dropIfExists('ingrediente');
    }
}
