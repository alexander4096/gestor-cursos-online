<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // poblar las tablas en cola
        $this->call(User_adminTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CursosTableSeeder::class);
        $this->call(UsersTableFake::class);
        $this->call(CursosTableFake::class);
        $this->call(GaleriafotosTableFake::class);
        $this->call(MaterialTableFake::class);
        $this->call(DiplomaTableFake::class);
        $this->call(Rel_user_curso_Fake::class);
        $this->call(Rel_comentarios_Fake::class);
    }
}
