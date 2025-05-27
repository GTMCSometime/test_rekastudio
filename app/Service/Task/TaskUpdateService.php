<?php

namespace App\Service\Task;

use App\Http\Resources\TaskResource;
use Illuminate\Support\Facades\DB;

class TaskUpdateService  {

    public function update(array $data, $task) {
        DB::beginTransaction();
        try {
            if(isset($data["title"])) {
                $task->update([
                    "title"=> $data["title"],
                ]);
            }

            if(isset($data["text"])) {
                $task->update([
                    "text"=> $data["text"],
                ]);
            }

            if (isset($data["tags"])) {
                $task->tags()->sync($data["tags"]);
                }
            
                
            DB::commit();

            $updateTask = $task->load('tags');
            return new TaskResource($updateTask);

        } catch(\Exception $exception) {

            DB::rollBack();
            throw $exception;
        }
    }
}