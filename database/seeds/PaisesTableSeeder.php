<?php

use Illuminate\Database\Seeder;

class PaisesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('paises')->insert([
            'pais' => 'Colombia',
        ]);
        DB::table('paises')->insert([
            'pais' => 'Bolivia',
        ]);
    }
}
