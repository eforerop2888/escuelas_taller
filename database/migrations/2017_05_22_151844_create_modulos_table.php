<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modulos', function(Blueprint $table){
            $table->increments('id');
            $table->string('nombre');
            $table->integer('duracion');
            $table->string('tipo_modulo');
            $table->text('objetivo');
            $table->string('nombre_maestro');
            $table->string('mail_maestro');
            $table->text('experiencia');
            $table->integer('user_id');
            $table->integer('programa_id');
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
        Schema::dropIfExists('modulos');
    }
}
