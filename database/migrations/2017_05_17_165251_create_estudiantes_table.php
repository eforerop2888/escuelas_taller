<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function(Blueprint $table){
            $table->increments('id');
            $table->integer('etnia_mujeres');
            $table->integer('etnia_hombres');
            $table->integer('victimas_mujeres');
            $table->integer('victimas_hombres');
            $table->integer('excombatientes_mujeres');
            $table->integer('excombatientes_hombres');
            $table->integer('desplazados_mujeres');
            $table->integer('desplazados_hombres');
            $table->integer('pobreza_mujeres');
            $table->integer('pobreza_hombres');
            $table->integer('certificados_mujeres');
            $table->integer('certificados_hombres');
            $table->integer('total_mujeres');
            $table->integer('total_hombres');
            $table->integer('programa_id')->unsigned();
            $table->foreign('programa_id')->references('id')->on('programas');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estudiantes');
    }
}
