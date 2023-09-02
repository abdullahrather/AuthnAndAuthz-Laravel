<?php

namespace Database\Seeders;

use App\Models\Application;
use App\Models\HEI;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ApplicationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $heiId = HEI::pluck('id')->toArray();
        for ($i = 1; $i <= 10; $i++) {
            $application = new Application();
            $application->hei_id = $faker->randomElement($heiId);
            $application->title = $faker->domainWord;
            $application->save();
        }
    }
}
