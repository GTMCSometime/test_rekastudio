<?php

namespace App\Service\Tag;

use Illuminate\Support\Facades\DB;

class TagUpdateService  {

    public function update(array $data, $tag) {
        try {
            $tag->update($data);
            

            DB::commit();

            return response()->json([
                'message' => 'Тег обновлен.',
                'data' => $data['title']], 201);

        } catch(\Exception $exception) {

            DB::rollBack();
            return response()->json([
                'error' => 'Не удалось обновить тег!',
                'message' => $exception->getMessage(),
            ], 500);
        }
    }
}