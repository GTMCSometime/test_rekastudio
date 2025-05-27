<?php

namespace App\Service\Task;

use Illuminate\Support\Facades\DB;

class TaskDestroyService  {

    public function destroy($task) {
        DB::beginTransaction();
        try {
            $task->delete();
            DB::commit();
        } catch(\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }
}