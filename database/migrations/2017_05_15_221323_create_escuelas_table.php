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
      $table->string('nombre')->nullable();
      $table->string('direccion')->nullable();
      $table->string('telefono')->nullable();
      $table->string('pagina_web')->nullable();
      $table->string('director')->nullable();
      $table->string('director_email')->nullable();
      $table->string('coordinador')->nullable();
      $table->string('coordinador_email')->nullable();
      $table->string('coordinador_humano')->nullable();
      $table->string('coordinador_humano_email')->nullable();
      $table->string('acto_administrativo')->nullable();
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
