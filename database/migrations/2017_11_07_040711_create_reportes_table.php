<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reporte', function (Blueprint $table) {
          $table->increments('id');
        $table->date('fecha');
        //Para la llave foranea
        $table->integer('planNutricional_id')->unsigned();
        //Seteo diciendo que son las claves foraneas
        $table->foreign('planNutricional_id')->references('id')->on('planNutricional')->onDelete('cascade');
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
        Schema::dropIfExists('reporte');
    }
}
