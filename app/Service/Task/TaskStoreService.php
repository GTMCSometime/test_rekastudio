<?php

namespace App\Service\Task;

use App\Http\Resources\TaskResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TaskStoreService  {

    public function store(array $data, $request) {
        DB::beginTransaction();
        try {
            $task = Auth::user()->tasks()->create($data);
    
            if ($request->has('tags')) {
                $task->tags()->attach($request->tags);
            }
            DB::commit();
            return new TaskResource($task);
        } catch(\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }
}