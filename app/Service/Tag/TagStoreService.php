<?php

namespace App\Service\Tag;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TagStoreService  {

    public function store(array $data) {
        try {
            $tags = Tag::create([
                'title' => $data['title'],
            ]);
            

            DB::commit();

            return response()->json([
                'message' => 'Тег создан.',
                'data' => $tags], 201);

        } catch(\Exception $exception) {

            DB::rollBack();
            return response()->json([
                'error' => 'Не удалось создать тег!',
                'message' => $exception->getMessage(),
            ], 500);
        }
    }
}