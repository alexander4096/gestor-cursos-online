<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaRelAlumnoClases extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rel_alumno_clases', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('alumnos_id')->unsigned();  // pone tipo int(10)
            $table->integer('clases_id')->unsigned();

            // FK relacion tabla alumnos
            $table->foreign('alumnos_id')->references('id')->on('alumnos');
            // FK relacion tabla clases
            $table->foreign('clases_id')->references('id')->on('clases');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rel_alumno_clases');
    }
}
