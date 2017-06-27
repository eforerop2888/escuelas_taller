<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramasTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('programas', function (Blueprint $table) {
      $table->increments('id');
      $table->string('nombre')->nullable();
      $table->integer('duracion_meses')->nullable();
      $table->integer('duracion_horas')->nullable();
      $table->integer('duracion_practicas_horas')->nullable();
      $table->text('objetivo_programa')->nullable();
      $table->text('requisitos_ingreso')->nullable();
      $table->text('trabajo_egresados')->nullable();
      $table->integer('escuela_id')->unsigned();
      $table->foreign('escuela_id')->references('id')->on('escuelas');
      $table->integer('user_id')->unsigned();
      $table->foreign('user_id')->references('id')->on('users');
      $table->integer('estado_id')->unsigned();
      $table->foreign('estado_id')->references('id')->on('estados');
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
    Schema::dropIfExists('programas');
  }
}
