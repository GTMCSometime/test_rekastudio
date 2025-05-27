<?php

namespace App\Service\Tag;

use App\Http\Resources\TagResource;
use Illuminate\Support\Facades\DB;

class TagUpdateService  {

    public function update(array $data, $tag) {
        DB::beginTransaction();
        try {
            $TagUpdate = $tag->update($data);
            DB::commit();
            return new TagResource($TagUpdate);
        } catch(\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }
}