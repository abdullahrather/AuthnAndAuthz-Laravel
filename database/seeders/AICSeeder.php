<?php

namespace Database\Seeders;

use App\Models\AIC;
use App\Models\Expertise;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AICSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $expertiseId = Expertise::pluck('id')->toArray();
        for ($i = 1; $i <= 10; $i++) {
            $aic = new AIC();
            $aic->expertise_id = $faker->randomElement($expertiseId);
            $aic->title = $faker->bs;
            $aic->location = $faker->address;
            $aic->save();
        }
    }
}
