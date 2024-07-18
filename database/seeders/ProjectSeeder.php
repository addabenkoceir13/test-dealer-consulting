<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'name' => 'Project 1',
            'description' => 'This is a sample project.',
            'user_id' => 1,
        ]);

        Project::create([
            'name' => 'Project 2',
            'description' => 'This is a sample project.',
            'user_id' => 1,
        ]);

        Project::create([
            'name' => 'Project 3',
            'description' => 'This is a sample project.',
            'user_id' => 2,
        ]);

        Project::create([
            'name' => 'Project 3',
            'description' => 'This is a sample project.',
            'user_id' => 2,
        ]);

        Project::create([
            'name' => 'Project 4',
            'description' => 'This is a sample project.',
            'user_id' => 3,
        ]);

        Project::create([
            'name' => 'Project 5',
            'description' => 'This is a sample project.',
            'user_id' => 3,
        ]);
    }
}
