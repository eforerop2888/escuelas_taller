<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(PaisesTableSeeder::class);
         $this->call(GenerosTableSeeder::class);
         $this->call(RolesTableSeeder::class);
    }
}
