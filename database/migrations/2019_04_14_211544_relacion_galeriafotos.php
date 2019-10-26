<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelacionGaleriafotos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('galeriafotos', function (Blueprint $table) {
            // FK relacion tabla cursos
            $table->foreign('id_cursos')->references('id')->on('cursos');
    
            });
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('galeriafotos', function (Blueprint $table) {
            //
        });
    }
}
