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
      $table->string('nombre');
      $table->integer('duracion_meses');
      $table->integer('duracion_horas');
      $table->integer('duracion_practicas_horas');
      $table->text('objetivo_programa');
      $table->text('requisitos_ingreso');
      $table->text('trabajo_egresados');
      $table->text('causas_desercion')->nullable();
      $table->integer('escuela_id')->unsigned();
      $table->foreign('escuela_id')->references('id')->on('escuelas');
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
    Schema::dropIfExists('programas');
  }
}
