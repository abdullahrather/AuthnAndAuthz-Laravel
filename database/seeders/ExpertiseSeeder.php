<?php

namespace Database\Seeders;

use App\Models\Expertise;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class ExpertiseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 1; $i <= 10; $i++) {
            $expertise = new Expertise();
            $expertise->title = $faker->jobTitle;
            $expertise->save();
        }
    }
}
