<?php

namespace Database\Seeders;

use App\Models\Programs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProgramsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 1; $i <= 10; $i++) {
            $criterion = new Programs() ;
            $criterion->title = $faker->domainName;
            $criterion->save();
        }
    }
}
