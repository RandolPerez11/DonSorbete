<?php

use Illuminate\Database\Seeder;

class UserRolAdmiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('role_user')->insert([
            'role_id'=>1,
            'user_id'=>1,
        ]);
        DB::table('permission_role')->insert([
            'permission_id'=>10,
            'role_id'=>2,
        ]);
        DB::table('caja')->insert([
            'sucursal'=>'Tlaltenango',
            'inicio'=>100,
        ]);

    }
}
