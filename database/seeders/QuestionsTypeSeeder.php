<?php

namespace Database\Seeders;

use App\Models\QuestionsType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class QuestionsTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 1; $i <= 10; $i++) {
            $questions_type = new QuestionsType() ;
            $questions_type->title = $faker->companySuffix;
            $questions_type->save();
        }
    }
}
