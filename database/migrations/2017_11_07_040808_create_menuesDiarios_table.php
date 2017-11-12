<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuesDiariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('menuDiario', function (Blueprint $table) {
        $table->increments('id');
        $table->string('nombre');
        $table->string('descripcion');
        $table->timestamps();
    });


    //para la tabla pivot entre planNutricional y menuDiario
    Schema::create('planNutricional_menuDiario', function (Blueprint $table) {
        $table->increments('id');
        //Para la llave foranea
        $table->integer('planNutricional_id')->unsigned();
        $table->integer('menuDiario_id')->unsigned();
        //Seteo diciendo que son las claves foraneas
        $table->foreign('planNutricional_id')->references('id')->on('planNutricional')->onDelete('cascade');
        $table->foreign('menuDiario_id')->references('id')->on('menuDiario')->onDelete('cascade');
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
      Schema::dropIfExists('planNutricional_menuDiario');
      Schema::dropIfExists('menuDiario');
    }
}
