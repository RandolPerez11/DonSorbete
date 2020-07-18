<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //user

        Permission::create([
        'name' => 'Navegar usuarios',
        'slug' => 'users.index',
        'description' => 'Lista y navega todos los usuarios del sistema (Administrador)',
    ]);

        Permission::create([
        'name' => 'Ver detalle de usuario',
        'slug' => 'users.show',
        'description' => 'Ver detalle de cada usuario del sistema (Administrador)',
    ]);

        Permission::create([
        'name' => 'Edicion de usuario',
        'slug' => 'users.edit',
        'description' => 'Editar cualquier dato de un usuario del sistema (Administrador)',
    ]);

        Permission::create([
        'name' => 'Eliminar usuario',
        'slug' => 'users.destroy',
        'description' => 'Eliminar cualquier usuario del sistema (Administrador)',
    ]);


    //roles
        Permission::create([
        'name' => 'Navegar roles',
        'slug' => 'roles.index',
        'description' => 'Lista y navega todos los roles del sistema (Administrador)',
    ]);

        Permission::create([
        'name' => 'Creacion rol',
        'slug' => 'roles.create',
        'description' => 'Crear un rol del sistema (Administrador)',
    ]);

        Permission::create([
        'name' => 'Ver detalle de rol',
        'slug' => 'roles.show',
        'description' => 'Ver detalle de cada rol del sistema (Administrador)',
    ]);

        Permission::create([
        'name' => 'Edicion de rol',
        'slug' => 'roles.edit',
        'description' => 'Editar cualquier dato de un rol del sistema (Administrador)',
    ]);

        Permission::create([
        'name' => 'Eliminar rol',
        'slug' => 'roles.destroy',
        'description' => 'Eliminar cualquier rol del sistema (Administrador)',
    ]);

    //Ingresos/Egresos
        Permission::create([
        'name' => 'Navegar en Ventas',
        'slug' => 'ventas.index',
        'description' => 'Ver las ventas del dia (Administrador,Empeado)',
    ]);

        Permission::create([
        'name' => 'Regristrar Ventas',
        'slug' => 'ventas.create',
        'description' => 'Crear un grupo en el sistema (Administrador,Empeado)',
    ]);

        Permission::create([
        'name' => 'Corte de Caja',
        'slug' => 'ventas.cierre',
        'description' => 'Hacer corte de cajas (Administrador,Empeado)',
    ]);
  }
}
