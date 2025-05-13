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
        $data = $request->validated();
        $response = $this->taskStoreService->store($data, $request);
        return $response;
    }


    public function show(string $id)
    {
        //
    }


    public function update(TaskUpdateRequest $request, Task $task)
    {
        $data = $request->validated();
        $response = $this->taskUpdateService->update($data, $task);
        return $response;
    }


    public function destroy(Task $task)
    {
        $response = $this->taskDestroyService->destroy($task);
        return $response;
    }
}
