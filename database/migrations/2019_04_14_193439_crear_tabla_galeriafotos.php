<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaGaleriafotos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galeriafotos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_cursos')->unsigned();
            $table->string('url_fotos');
            $table->string('titulofotos');
            $table->boolean('checkgaleria')->default(false);
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
        Schema::dropIfExists('galeriafotos');
    }
}
