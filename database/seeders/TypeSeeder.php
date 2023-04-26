<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type; //model
use Illuminate\Support\Str; //str

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ["Front End", "Back End", "Full Stack"]; //tipi
        //Ciclo
        foreach ($types as $type) {
            $newType = new Type(); //nuovo tipo
            $newType->name = $type; //nome
            $newType->slug = Str::slug($type, "-"); //slug
            $newType->save(); //invio i dati dal database
        }
    }
}
