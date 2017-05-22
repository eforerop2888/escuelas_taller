<?php

use Illuminate\Database\Seeder;

class TiposModulosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_modulos')->insert([
            'tipo' => 'practico',
        ]);
        DB::table('tipos_modulos')->insert([
            'tipo' => 'teorico',
        ]);
    }
}
