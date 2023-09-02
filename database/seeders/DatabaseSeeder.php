<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(
            [
                UserSeeder::class,
                VisitTypeSeeder::class,
                CriterionSeeder::class,
                QuestionsTypeSeeder::class,
                QuestionsSeeder::class,
                ExpertiseSeeder::class,
                HEISeeder::class,
                AICSeeder::class,
                ProgramsSeeder::class,
                ApplicationsSeeder::class,
                VisitTypesQuestionsSeeder::class,
                HeiProgramsSeeder::class,
            ]
        );
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
