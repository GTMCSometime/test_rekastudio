<?php

namespace App\Service\Task;

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

            return $task->load('tags');

        } catch(\Exception $exception) {

            DB::rollBack();
            throw $exception;
        }
    }
}