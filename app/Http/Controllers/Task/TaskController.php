<?php

namespace App\Http\Controllers\Task;

use App\Http\Requests\Task\TaskStoreRequest;
use App\Http\Requests\Task\TaskUpdateRequest;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends TaskBaseController
{
    public function index()
    {
        $tasks = Auth::user()->tasks()->with('tags')->orderBy('id', 'desc')->get();
        return response()->json($tasks);
    }


    public function store(TaskStoreRequest $request)
    {
        try {
            $data = $request->validated();
            $response = $this->taskStoreService->store($data, $request);
            return response()->json([
                'message' => 'Задача создана',
                'data' => $response], 201);
        } catch (\Exception $exception) {
            return response()->json([
                'error' => 'Ошибка при создании задачи',
                'message' => $exception->getMessage(),
            ], 500);
        }
    }


    public function show(Task $task)
    {
        return response()->json($task->load('tags'));
    }


    public function update(TaskUpdateRequest $request, Task $task)
    {
        try {
            $data = $request->validated();
            $response = $this->taskUpdateService->update($data, $task);
            return response()->json([
                'message' => 'Задача обновлена',
                'data' => $response], 201);
        } catch (\Exception $exception) {
            return response()->json([
                'error' => 'Ошибка при обновлении задачи',
                'message' => $exception->getMessage(),
            ], 500);
        }
    }


    public function destroy(Task $task)
    {
        try {
            $response = $this->taskDestroyService->destroy($task);
            return response()->json([
                'message' => 'Задача удалена',
                'data' => $response], 201);
        } catch (\Exception $exception) {
            return response()->json([
                'error' => 'Ошибка при удалении задачи',
                'message' => $exception->getMessage(),
            ], 500);
        }
    }
}
