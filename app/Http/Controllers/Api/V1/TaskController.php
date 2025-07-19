<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Services\TaskService;
use App\Models\Task;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService) 
    {
        $this->taskService = $taskService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = $request->only(['status', 'assigned_user_id']);
        $perPage = $request->get('per_page', 10);

        $data = $this->taskService->getTasks($filters, $perPage);

        return response()->json([
            'success' => true,
            'message' => 'Tasks retrieved successfully',
            'data' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        $data = $request->validated();
        $task = $this->taskService->createTask($data);
        return response()->json([
            'success' => true,
            'message' => 'Task created successfully',
            'data' => $task
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = $this->taskService->getTask($id);

        return response()->json([
            'success' => true,
            'message' => 'Task retrieved successfully',
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, string $id)
    {
        $data = $request->validated();
        $task = $this->taskService->updateTask($id, $data);
        return response()->json([
            'success' => true,
            'message' => 'Task updated successfully',
            'data' => $task
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->taskService->deleteTask($id);

        return response()->json([
            'success' => true,
            'message' => 'Task deleted successfully',
            'data' => null
        ]);
    }
}
