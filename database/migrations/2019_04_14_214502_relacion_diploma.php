<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelacionDiploma extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('diploma', function (Blueprint $table) {
            // FK relacion tabla cursos
            $table->foreign('id_curso')->references('id')->on('cursos');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('diploma', function (Blueprint $table) {
            //
        });
    }
}
