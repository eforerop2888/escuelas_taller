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
            ['pais' => 'argentina'],
            ['pais' => 'bolivia'],
            ['pais' => 'chile'],
            ['pais' => 'colombia'],
            ['pais' => 'cuba'],
            ['pais' => 'ecuador'],
            ['pais' => 'guatemala'],
            ['pais' => 'honduras'],
            ['pais' => 'méxico'],
            ['pais' => 'panamá'],
            ['pais' => 'paraguay'],
            ['pais' => 'perú'],
            ['pais' => 'república dominicana'],
            ['pais' => 'uruguay'],
            ['pais' => 'venezuela']
        ]);
    }
}
