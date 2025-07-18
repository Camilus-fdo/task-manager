<?php

namespace App\Services;

use App\Repository\TaskRepositoryInterface;

class TaskService
{
    protected $taskRepo;

    public function __construct(TaskRepositoryInterface $taskRepo) {
        $this->taskRepo = $taskRepo;
    }

    public function getTasks(array $filters, int $perPage = 10)
    {
        return $this->taskRepo->all($filters, $perPage);
    }

    public function getTask(int $id)
    {
        return $this->taskRepo->find($id);
    }

    public function createTask(array $data)
    {
        return $this->taskRepo->create($data);
    }

    public function updateTask(int $id, array $data)
    {
        return $this->taskRepo->update($id, $data);
    }

    public function deleteTask(int $id)
    {
        return $this->taskRepo->delete($id);
    }
}
