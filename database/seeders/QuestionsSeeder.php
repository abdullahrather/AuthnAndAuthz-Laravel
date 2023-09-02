<?php

namespace Database\Seeders;

use App\Models\Criterion;
use App\Models\Questions;
use App\Models\QuestionsType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $questionsTypeId = QuestionsType::pluck('id')->toArray();
        $criterionId = Criterion::pluck('id')->toArray();
        for ($i = 1; $i <= 10; $i++) {
            $questions = new Questions();
            $questions->question_type_id = $faker->randomElement($questionsTypeId);
            $questions->criterion_id = $faker->randomElement($criterionId);
            $questions->title = $faker->realText;
            $questions->save();
        }
    }
}
