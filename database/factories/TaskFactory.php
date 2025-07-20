<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Task;
use App\Models\User;

/**
 * @extends Factory<Task>
 */
class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'status' => $this->faker->randomElement(['pending', 'in_progress', 'completed']),
            'assigned_user_id' => User::factory(),
            'due_date' => $this->faker->date(),
        ];
    }
} 