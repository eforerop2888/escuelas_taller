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
            $table->string('nombre')->nullable();
            $table->integer('duracion')->nullable();
            $table->string('tipo_modulo')->nullable();
            $table->text('objetivo')->nullable();
            $table->string('nombre_maestro')->nullable();
            $table->string('mail_maestro')->nullable();
            $table->text('experiencia')->nullable();
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
