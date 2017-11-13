<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
          'nombreUsuario' => 'admin',
          'email' => 'admin@gmail.com',
          'password' => bcrypt('123456'),
          'nombre' => 'Administrador Prueba',
          'direccion' => 'No Tiene',
          'dni' => '11222333',
          'cargo' => 'Docente',
          'perfil_id' => '1',
          'escuela_id' => '1',
      ]);

      DB::table('users')->insert([
          'nombreUsuario' => 'miembro',
          'email' => 'miembro@gmail.com',
          'password' => bcrypt('123456'),
          'nombre' => 'Miembro Prueba',
          'direccion' => 'No Tiene',
          'dni' => '44555666',
          'cargo' => 'Docente',
          'perfil_id' => '2',
          'escuela_id' => '2',
      ]);

    }
}
