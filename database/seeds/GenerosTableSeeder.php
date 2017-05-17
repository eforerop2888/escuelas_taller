<?php

use Illuminate\Database\Seeder;

class GenerosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('generos')->insert([
	        'genero' => 'mujer',
        ]);
        DB::table('generos')->insert([
            'genero' => 'hombre',
        ]);
    }
}
