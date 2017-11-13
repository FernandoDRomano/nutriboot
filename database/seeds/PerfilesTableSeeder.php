<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class PerfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('perfil')->insert([
          'nombre' => 'Administrador',
      ]);

      DB::table('perfil')->insert([
          'nombre' => 'Miembro',
      ]);

    }
}
