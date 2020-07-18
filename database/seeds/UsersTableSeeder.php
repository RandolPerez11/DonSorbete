<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //factory(App\User::class, 20)->create();

        Role::create([
          'name' => 'Admin',
          'slug' => 'admin',
          'description' => 'Acceso a todos los permisos.',
          'special' => 'all-access'
        ]);
        Role::create([
          'name' => 'Empleado',
          'slug' => 'empleado',
          'description' => 'Registrar ventas.'
        ]);
        Role::create([
          'name' => 'Sin Acceso al Sistema',
          'slug' => 'Sin Acceso al Sistema',
          'description' => 'Sin Acceso al Sistema.'
        ]);


    }
}
