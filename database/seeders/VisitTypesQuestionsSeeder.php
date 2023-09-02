<?php

namespace Database\Seeders;

use App\Models\Questions;
use App\Models\VisitType;
use App\Models\VisitTypeQuestions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class VisitTypesQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $visitTypeId = VisitType::pluck('id')->toArray();
        $questions_id = Questions::pluck('id')->toArray();
        for ($i = 0; $i < 10; $i++) {
            $visitype_ques = new VisitTypeQuestions();
            $visitype_ques->visit_types_id = $faker->randomElement($visitTypeId);
            $visitype_ques->questions_id = $faker->randomElement($questions_id);
            $visitype_ques->save();
        }
    }
}
