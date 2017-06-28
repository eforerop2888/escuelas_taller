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
            $table->integer('blanco_mujeres')->nullable();
            $table->integer('blanco_hombres')->nullable();
            $table->integer('caucasico_mujeres')->nullable();
            $table->integer('caucasico_hombres')->nullable();
            $table->integer('afrodescendiente_mujeres')->nullable();
            $table->integer('afrodescendiente_hombres')->nullable();
            $table->integer('indigena_mujeres')->nullable();
            $table->integer('indigena_hombres')->nullable();
            $table->integer('mestizo_mujeres')->nullable();
            $table->integer('mestizo_hombres')->nullable();
            $table->integer('raizal_isleno_mujeres')->nullable();
            $table->integer('raizal_isleno_hombres')->nullable();
            $table->integer('rom_gitano_mujeres')->nullable();
            $table->integer('rom_gitano_hombres')->nullable();
            $table->integer('criollo_mujeres')->nullable();
            $table->integer('criollo_hombres')->nullable();
            $table->integer('amerindio_mujeres')->nullable();
            $table->integer('amerindio_hombres')->nullable();
            $table->integer('polinesio_mujeres')->nullable();
            $table->integer('polinesio_hombres')->nullable();
            $table->integer('melanesio_mujeres')->nullable();
            $table->integer('melanesio_hombres')->nullable();
            $table->integer('asiatico_mujeres')->nullable();
            $table->integer('asiatico_hombres')->nullable();
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
