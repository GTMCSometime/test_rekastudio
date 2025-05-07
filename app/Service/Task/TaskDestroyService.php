<?php

namespace App\Service\Task;

use Illuminate\Support\Facades\DB;

class TaskDestroyService  {

    public function destroy($task) {
        DB::transaction(function () use ($task) {
            $task->tags()->detach();
            $task->delete();
        });
    
        return response()->json([
            'message' => 'Задача удалена'
        ], 200);
}
}