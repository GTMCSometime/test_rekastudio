<?php

namespace App\Service\Task;

use Illuminate\Support\Facades\DB;

class TaskUpdateService  {

    public function update(array $data, $task) {
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

            return response()->json(
                $task->load('tags'), 201);

        } catch(\Exception $exception) {

            DB::rollBack();
            return response()->json([
                'error' => 'Не удалось обновить задачу!',
                'message' => $exception->getMessage(),
            ], 500);
        }
    }
}