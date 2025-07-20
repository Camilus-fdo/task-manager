<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Task;
use App\Models\User;

class TaskFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_tasks()
    {
        Task::factory()->count(3)->create();
        $response = $this->getJson('/api/tasks');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'success', 'message', 'data' => [
                         'current_page', 'data', 'first_page_url', 'from', 'last_page', 'last_page_url', 'links', 'next_page_url', 'path', 'per_page', 'prev_page_url', 'to', 'total'
                     ]
                 ]);
    }

    public function test_can_create_task()
    {
        $user = User::factory()->create();
        $data = [
            'title' => 'Test Task',
            'description' => 'Test Description',
            'status' => 'pending',
            'assigned_user_id' => $user->id,
            'due_date' => '2025-12-31',
        ];
        $response = $this->postJson('/api/tasks', $data);
        $response->assertStatus(201)
                 ->assertJsonFragment(['title' => 'Test Task']);
    }

    public function test_can_show_task()
    {
        $task = Task::factory()->create();
        $response = $this->getJson('/api/tasks/' . $task->id);
        $response->assertStatus(200)
                 ->assertJsonFragment(['id' => $task->id]);
    }

    public function test_can_update_task()
    {
        $task = Task::factory()->create();
        $user = User::factory()->create();
        $data = [
            'title' => 'Updated Task title',
            'description' => 'Test Description',
            'status' => 'completed',
            'assigned_user_id' => $user->id,
            'due_date' => '2025-12-31',
        ];
        $response = $this->putJson('/api/tasks/' . $task->id, $data);
        $response->assertStatus(200)
                 ->assertJsonFragment(['title' => 'Updated Task title']);
    }

    public function test_can_delete_task()
    {
        $task = Task::factory()->create();
        $response = $this->deleteJson('/api/tasks/' . $task->id);
        $response->assertStatus(200)
                 ->assertJsonFragment(['success' => true]);
    }
} 