<?php

namespace Database\Seeders;

use App\Models\Criterion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CriterionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 1; $i <= 10; $i++) {
            $criterion = new Criterion() ;
            $criterion->title = $faker->jobTitle;
            $criterion->save();
        }
    }
}
