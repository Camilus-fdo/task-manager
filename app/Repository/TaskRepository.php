<?php

namespace App\Repository;

use App\Repository\TaskRepositoryInterface;
use App\Models\Task;

class TaskRepository implements TaskRepositoryInterface
{
    public function all($filters, $perPage = 10)
    {
        return Task::when(isset($filters['status']), function ($query) use ($filters) {
                return $query->where('status', $filters['status']);
            })
            ->when(isset($filters['assigned_user_id']), function ($query) use ($filters) {
                return $query->where('assigned_user_id', $filters['assigned_user_id']);
            })
            ->orderBy('due_date', 'asc')
            ->paginate($perPage);
    }

    public function find($id)
    {
        return Task::findOrFail($id);
    }

    public function create($data)
    {
        return Task::create($data);
    }

    public function update($id, $data)
    {
        $task = Task::findOrFail($id);
        $task->update($data);
        return $task;
    }

    public function delete($id)
    {
        $task = Task::findOrFail($id);
        return $task->delete();
    }
}
