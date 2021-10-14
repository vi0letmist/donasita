<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //This resets the table, deleting all the data everytime the function is called.
        User::create([
            'name' => 'Admin magang',
            'email' => 'admin@gmail.com',
            'foto_profil' => 'foto_default_profil.png',
            'role' => 'admin',
            'password' => '$2y$10$b1vZlMibQqy9LePYlDuV6eo4i3ge58rHsMxTllUELYvqNfCtuACMe',
        ]);
        User::create([
            'name' => 'Jaffar Jatmiko Jati',
            'email' => 'jaffar@gmail.com',
            'foto_profil' => 'foto_default_profil.png',
            'role' => 'pengguna',
            'password' => '$2y$10$b1vZlMibQqy9LePYlDuV6eo4i3ge58rHsMxTllUELYvqNfCtuACMe',
        ]);
    }
}
