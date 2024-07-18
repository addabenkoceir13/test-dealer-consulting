<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::create([
            'name' => 'Task 01',
            'description' => 'This is a sample Task.',
            'project_id' => 1,
            'status' => 'Pending',
        ]);
        Task::create([
            'name' => 'Task 02',
            'description' => 'This is a sample Task.',
            'project_id' => 1,
            'status' => 'in-progress',
        ]);
        Task::create([
            'name' => 'Task 03',
            'description' => 'This is a sample Task.',
            'project_id' => 1,
            'status' => 'completed',
        ]);
        Task::create([
            'name' => 'Task 04',
            'description' => 'This is a sample Task.',
            'project_id' => 2,
            'status' => 'Pending',
        ]);
        Task::create([
            'name' => 'Task 05',
            'description' => 'This is a sample Task.',
            'project_id' => 2,
            'status' => 'Pending',
        ]);
        Task::create([
            'name' => 'Task 06',
            'description' => 'This is a sample Task.',
            'project_id' => 3,
            'status' => 'Pending',
        ]);
        Task::create([
            'name' => 'Task 07',
            'description' => 'This is a sample Task.',
            'project_id' => 3,
            'status' => 'Pending',
        ]);
        Task::create([
            'name' => 'Task 08',
            'description' => 'This is a sample Task.',
            'project_id' => 4,
            'status' => 'Pending',
        ]);
    }
}
