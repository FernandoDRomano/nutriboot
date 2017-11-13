<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class EscuelasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('escuela')->insert([
          'nombre' => 'Comercio N°1',
          'direccion' => 'Los Ralos',
          'telefono' => '4236781',
      ]);

      DB::table('escuela')->insert([
          'nombre' => 'Tecnica N°8',
          'direccion' => 'Villa Quintero',
          'telefono' => '4572912',
      ]);

      DB::table('escuela')->insert([
          'nombre' => 'Juan Bautista Alberdi',
          'direccion' => 'Alberdi',
          'telefono' => '4562891',
      ]);

      DB::table('escuela')->insert([
          'nombre' => 'Maria Auxiliadora',
          'direccion' => 'Concepcion',
          'telefono' => '4781239',
      ]);
    }
}
