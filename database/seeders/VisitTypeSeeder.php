<?php

namespace Database\Seeders;

use App\Models\VisitType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class VisitTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 1; $i <= 10; $i++) {
            $visit_type = new VisitType();
            $visit_type->title = $faker->catchPhrase;
            $visit_type->save();
        }
    }
}
