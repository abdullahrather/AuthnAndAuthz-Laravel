<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'role' => 'admin',
                'level' => 1,
            ],
            [
                'role' => 'aic',
                'level' => 2,
            ],
            [
                'role' => 'hei',
                'level' => 3,
            ],
        ];
        DB::table('roles')->insert($roles);
    }
}
