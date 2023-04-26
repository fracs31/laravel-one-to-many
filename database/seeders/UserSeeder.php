<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; //model
use Illuminate\Support\Facades\Hash; //hash

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newUser = new User(); //utente
        $newUser->name = "Francesco"; //nome
        $newUser->email = "pist.fracs90@gmail.com"; //email
        $newUser->password = Hash::make("francesco"); //password
        $newUser->save(); //invio i dati dal database
    }
}
