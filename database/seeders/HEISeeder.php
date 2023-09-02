<?php

namespace Database\Seeders;

use App\Models\HEI;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class HEISeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 1; $i <= 10; $i++) {
            $hei = new HEI();
            $hei->title = $faker->company;
            $hei->save();
        }
    }
}
