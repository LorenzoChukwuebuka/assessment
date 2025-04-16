<?php
namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Tasks;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            // Create specific tasks for the first user
            if ($user->id === 1) {
                Tasks::create([
                    'user_id'     => $user->id,
                    'title'       => 'Complete project documentation',
                    'description' => 'Write comprehensive documentation for the Task Manager API project',
                    'status'      => 'pending',
                    'due_date'    => Carbon::now()->addDays(5),
                ]);

                Tasks::create([
                    'user_id'     => $user->id,
                    'title'       => 'Fix authentication bugs',
                    'description' => 'Address issues with token expiration and refresh',
                    'status'      => 'in_progress',
                    'due_date'    => Carbon::now()->addDays(2),
                ]);

                Tasks::create([
                    'user_id'     => $user->id,
                    'title'       => 'Deploy to production',
                    'description' => 'Prepare and execute production deployment',
                    'status'      => 'pending',
                    'due_date'    => Carbon::now()->addDays(10),
                ]);
            }

            // Create random tasks for each user
            for ($i = 0; $i < 3; $i++) {
                $statuses = ['pending', 'in_progress', 'completed'];

                Tasks::create([
                    'user_id'     => $user->id,
                    'title'       => 'Task ' . ($i + 1) . ' for ' . $user->name,
                    'description' => 'This is a sample task description for task ' . ($i + 1),
                    'status'      => $statuses[array_rand($statuses)],
                    'due_date'    => Carbon::now()->addDays(rand(1, 14)),
                ]);
            }
        }

    }
}