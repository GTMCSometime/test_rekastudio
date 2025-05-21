<?php

namespace App\Service\Task;

use Illuminate\Support\Facades\DB;

class TaskDestroyService  {

    public function destroy($task) {
        DB::beginTransaction();
        try {
            $taskDelete = $task->delete();
            DB::commit();
            return $taskDelete;
        } catch(\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }
}