<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsumosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('insumo', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nombre');
          $table->string('descripcion');
          $table->integer('cantidad');
          $table->date('fechaVencimiento');
          $table->integer('calorias');
          //Para la llave foranea
          $table->integer('categoria_id')->unsigned();
          //Seteo diciendo que son las claves foraneas
          $table->foreign('categoria_id')->references('id')->on('categoria')->onDelete('cascade');
          $table->timestamps();
      });

      //Para la tabla pivot entre insumo y proveedores
      Schema::create('insumo_proveedor', function (Blueprint $table) {
          $table->increments('id');
          //Para la llave foranea
          $table->integer('insumo_id')->unsigned();
          $table->integer('proveedor_id')->unsigned();
          //Seteo diciendo que son las claves foraneas
          $table->foreign('insumo_id')->references('id')->on('insumo')->onDelete('cascade');
          $table->foreign('proveedor_id')->references('id')->on('proveedor')->onDelete('cascade');
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
      Schema::dropIfExists('insumo_proveedor');
      Schema::dropIfExists('insumo');
    }
}
