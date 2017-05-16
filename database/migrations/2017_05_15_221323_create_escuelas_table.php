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
      $table->string('pagina_web');
      $table->string('director');
      $table->string('director_email');
      $table->string('coordinador');
      $table->string('coordinador_email');
      $table->string('coordinador_humano');
      $table->string('coordinador_humano_email');
      $table->string('acto_administrativo');
      $table->string('otorga_permiso');
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
    Schema::drop('escuelas')
  }
}
