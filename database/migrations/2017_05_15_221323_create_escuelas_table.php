<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEscuelasTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('escuelas', function (Blueprint $table) {
      $table->increments('id');
      $table->string('nombre');
      $table->string('direccion');
      $table->string('telefono');
      $table->string('pagina_web')->nullable();
      $table->string('director');
      $table->string('director_email');
      $table->string('coordinador');
      $table->string('coordinador_email');
      $table->string('coordinador_humano');
      $table->string('coordinador_humano_email');
      $table->string('acto_administrativo');
      $table->integer('pais_id')->unsigned();
      $table->foreign('pais_id')->references('id')->on('paises');
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
    Schema::dropIfExists('escuelas');
  }
}
