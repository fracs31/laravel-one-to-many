<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project; //model
use App\Models\Type; //model
use Faker\Generator as Faker; //faker
use Illuminate\Support\Str; //str

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $type_ids= Type::all()->pluck("id")->all(); //id dei tipi di progetto
        //Ciclo
        for ($i = 0; $i < 5; $i++) {
            $newProject = new Project(); //nuovo progetto
            $newProject->title = $faker->unique()->sentence($faker->numberBetween(3, 5)); //titolo
            $newProject->client = $faker->word(); //cliente
            $newProject->description = $faker->text(200); //descrizione
            $newProject->slug = Str::slug($newProject->title, "-"); //slug
            $newProject->url = "http://www.projects.com/" . $newProject->slug; //url
            $newProject->type_id = $faker->randomElement($type_ids);; //id del tipo di progetto
            $newProject->save(); //salvo i dati
        }
    }
}
