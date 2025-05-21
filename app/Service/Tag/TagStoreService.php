<?php

namespace App\Service\Tag;

use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class TagStoreService  {

    public function store(array $data) {
        DB::beginTransaction();
        try {
            $tag = Tag::create([
                'title' => $data['title'],
            ]);
            DB::commit();
            return $tag;
        } catch(\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }
}
