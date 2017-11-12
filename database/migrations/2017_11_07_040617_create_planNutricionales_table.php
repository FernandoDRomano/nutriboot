<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanNutricionalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planNutricional', function (Blueprint $table) {
          $table->increments('id');
          $table->date('fecha');
          //Para la llave foranea
          $table->integer('escuela_id')->unsigned();
          $table->integer('users_id')->unsigned();
          //Seteo diciendo que son las claves foraneas
          $table->foreign('escuela_id')->references('id')->on('escuela')->onDelete('cascade');
          $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('planNutricional');
    }
}
