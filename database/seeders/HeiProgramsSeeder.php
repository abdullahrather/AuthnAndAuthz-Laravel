<?php

namespace Database\Seeders;

use App\Models\HEIPrograms;
use App\Models\HEI;
use App\Models\Programs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class HeiProgramsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $hei_programs = new HEIPrograms();
        $heiId = HEI::pluck('id')->toArray();
        $programs_id = Programs::pluck('id')->toArray();
        for ($i = 0; $i < 10; $i++) {
            $hei_programs->hei_id = $faker->randomElement($heiId);
            $hei_programs->programs_id = $faker->randomElement($programs_id);
            $hei_programs->save();
        }
    }
}
