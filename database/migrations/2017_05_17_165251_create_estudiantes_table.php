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
            $table->integer('etnia_mujeres')->nullable();
            $table->integer('etnia_hombres')->nullable();
            $table->integer('victimas_mujeres')->nullable();
            $table->integer('victimas_hombres')->nullable();
            $table->integer('excombatientes_mujeres')->nullable();
            $table->integer('excombatientes_hombres')->nullable();
            $table->integer('desplazados_mujeres')->nullable();
            $table->integer('desplazados_hombres')->nullable();
            $table->integer('pobreza_mujeres')->nullable();
            $table->integer('pobreza_hombres')->nullable();
            $table->integer('cabeza_mujeres')->nullable();
            $table->integer('cabeza_hombres')->nullable();
            $table->integer('certificados_mujeres')->nullable();
            $table->integer('certificados_hombres')->nullable();
            $table->integer('egresados_programa_hombres')->nullable();
            $table->integer('egresados_programa_mujeres')->nullable();
            $table->integer('egresados_trabajo_hombres')->nullable();
            $table->integer('egresados_trabajo_mujeres')->nullable();
            $table->integer('egresados_trabajo_otro_hombres')->nullable();
            $table->integer('egresados_trabajo_otro_mujeres')->nullable();
            $table->integer('egresados_desempleados_hombres')->nullable();
            $table->integer('egresados_desempleados_mujeres')->nullable();
            $table->integer('total_mujeres')->nullable();
            $table->integer('total_hombres')->nullable();
            $table->text('causas_desercion')->nullable();
            $table->text('observaciones')->nullable();
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
