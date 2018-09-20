<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => "Mazeyar Rezaei Ghavamabadi",
            'email' => "mazeyarr@gmail.com",
            'password' => bcrypt('mazeyar123'),
            'role' => 0,
        ]);
        \App\User::create([
            'name' => "Julia Swinkels",
            'email' => "julia@zaalverhuur-amsterdam.nl",
            'password' => bcrypt('juliaswinkels'),
            'role' => 4,
        ]);
        \App\User::create([
            'name' => "Charlotte Gordeau",
            'email' => "charlotte@zaalverhuur-amsterdam.nl",
            'password' => bcrypt('charlottegordeau'),
            'role' => 5,
        ]);
        \App\User::create([
            'name' => "Sanne de Ruiter",
            'email' => "sanne@zaalverhuur-amsterdam.nl",
            'password' => bcrypt('mazeyar123'),
            'role' => 2,
        ]);
    }
}
