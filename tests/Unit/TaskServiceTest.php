<?php

use PHPUnit\Framework\TestCase;
use App\Services\TaskService;
use App\Repository\TaskRepositoryInterface;

class TaskServiceTest extends TestCase
{
    protected $mockRepo;
    protected $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->mockRepo = $this->createMock(TaskRepositoryInterface::class);
        $this->service = new TaskService($this->mockRepo);
    }

    public function testGetTasksReturnsMockData()
    {
        $mockData = [
            (object)['id' => 1, 'title' => 'Task 1'],
            (object)['id' => 2, 'title' => 'Task 2'],
        ];
        $this->mockRepo->method('all')->willReturn($mockData);
        $result = $this->service->getTasks([], 10);
        $this->assertEquals($mockData, $result);
    }

    public function testGetTaskReturnsMockTask()
    {
        $mockTask = (object)['id' => 1, 'title' => 'Task 1'];
        $this->mockRepo->method('find')->with(1)->willReturn($mockTask);
        $result = $this->service->getTask(1);
        $this->assertEquals($mockTask, $result);
    }

    public function testCreateTaskReturnsCreatedTask()
    {
        $data = ['title' => 'New Task'];
        $mockTask = (object)['id' => 1, 'title' => 'New Task'];
        $this->mockRepo->method('create')->with($data)->willReturn($mockTask);
        $result = $this->service->createTask($data);
        $this->assertEquals($mockTask, $result);
    }

    public function testUpdateTaskReturnsUpdatedTask()
    {
        $id = 1;
        $data = ['title' => 'Updated Task'];
        $mockTask = (object)['id' => 1, 'title' => 'Updated Task'];
        $this->mockRepo->method('update')->with($id, $data)->willReturn($mockTask);
        $result = $this->service->updateTask($id, $data);
        $this->assertEquals($mockTask, $result);
    }

    public function testDeleteTaskReturnsTrue()
    {
        $id = 1;
        $this->mockRepo->method('delete')->with($id)->willReturn(true);
        $result = $this->service->deleteTask($id);
        $this->assertTrue($result);
    }
} 