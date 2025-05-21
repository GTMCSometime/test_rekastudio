<?php

namespace App\Service\Task;

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
            return $task;
        } catch(\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }
}