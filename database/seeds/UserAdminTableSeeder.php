<?php

use Illuminate\Database\Seeder;

class UserAdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name'=>'Randol Perez',
            'email'=>'randol@gmail.com',
            'sucursal'=>'Tlaltenango',
            'password'=>bcrypt('123456'),
        ]);

        DB::table('sucursales')->insert([
            'name'=>'Tlaltenango',
            'direccion'=>'Morelos #20',
            'telefono'=>'4371001234',

        ]);
        DB::table('configuracion')->insert([
            'name'=>'Mini',
            'precio'=>'17',
            'url'=>'img/Mini.jpeg'
        ]);
        DB::table('configuracion')->insert([
            'name'=>'Chico',
            'precio'=>'24',
            'url'=>'img/Chico.jpeg'
        ]);
        DB::table('configuracion')->insert([
            'name'=>'Mediano',
            'precio'=>'28',
            'url'=>'img/mediana.jpg'
        ]);
        DB::table('configuracion')->insert([
              'name'=>'Grande',
              'precio'=>'33',
              'url'=>'img/Grande.jpeg'
        ]);
        DB::table('configuracion')->insert([
            'name'=>'Medio Litro',
            'precio'=>'58',
            'url'=>'img/MedioL.jpeg'
        ]);
        DB::table('configuracion')->insert([
            'name'=>'Litro',
            'precio'=>'98',
            'url'=>'img/Litro.jpeg'
        ]);
        DB::table('configuracion')->insert([
            'name'=>'Cono Sencillo',
            'precio'=>'20',
            'url'=>'img/conoS.png'
        ]);
        DB::table('configuracion')->insert([
            'name'=>'Cono Doble',
            'precio'=>'29',
            'url'=>'img/cono2.jpg'
        ]);
        DB::table('configuracion')->insert([
            'name'=>'Cazuela Sencilla',
            'precio'=>'20',
            'url'=>'img/CazuS.jpg'
        ]);
        DB::table('configuracion')->insert([
            'name'=>'Cazuela Doble',
            'precio'=>'29',
            'url'=>'img/CazuD.jpg'
        ]);

        DB::table('promocion')->insert([
            'activo'=>0,
            'producto'=>'Mini',
            'promo'=>'2x1'
        ]);
        DB::table('promocion')->insert([
            'activo'=>0,
            'producto'=>'Cono_Sencillo',
            'promo'=>'2x1'
        ]);
        DB::table('promocion')->insert([
            'activo'=>0,
            'producto'=>'Cono_Doble',
            'promo'=>'2x1'
        ]);

        DB::table('promocion')->insert([
            'activo'=>0,
            'producto'=>'Cazuela_Sencilla',
            'promo'=>'2x1'
        ]);
        DB::table('promocion')->insert([
            'activo'=>0,
            'producto'=>'Cazuela_Doble',
            'promo'=>'2x1'
        ]);

    }
}
