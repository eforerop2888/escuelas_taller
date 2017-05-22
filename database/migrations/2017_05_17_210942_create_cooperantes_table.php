<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCooperantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cooperantes', function(Blueprint $table){
            $table->increments('id');
            $table->string('nombre');
            $table->string('mail_contacto');
            $table->string('persona_contacto');
            $table->text('tipo_cooperacion');
            $table->text('resultados_significativos');
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
        Schema::dropIfExists('cooperantes');
    }
}
