<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelacionCursosUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cursos_users', function (Blueprint $table) {    
            // FK relacion tabla users
            $table->foreign('id_user')->references('id')->on('users');
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
        Schema::table('cursos_users', function (Blueprint $table) {
            //
        });
    }
}
