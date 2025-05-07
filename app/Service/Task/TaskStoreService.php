<?php

namespace App\Service\Task;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TaskStoreService  {

    public function store(array $data, $request) {
        try {
            $task = Auth::user()->tasks()->create($data);
    
            if ($request->has('tags')) {
                $task->tags()->attach($request->tags);
            }
            

            DB::commit();

            return response()->json(
                $task->load('tags'), 201);

        } catch(\Exception $exception) {

            DB::rollBack();
            return response()->json([
                'error' => 'Не удалось создать задачу!',
                'message' => $exception->getMessage(),
            ], 500);
        }
    }
}