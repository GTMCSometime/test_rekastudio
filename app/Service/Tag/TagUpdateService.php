<?php

namespace App\Service\Tag;

use Illuminate\Support\Facades\DB;

class TagUpdateService  {

    public function update(array $data, $tag) {
        DB::beginTransaction();
        try {
            $TagUpdate = $tag->update($data);
            DB::commit();
            return $TagUpdate;
        } catch(\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }
}