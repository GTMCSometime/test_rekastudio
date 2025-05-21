<?php

namespace App\Http\Controllers\Tag;

use App\Http\Requests\Tag\TagStoreRequest;
use App\Models\Tag;

class TagController extends TagBaseController
{
    public function index()
    {
        $tags = Tag::all();
        return response()->json($tags);
    }


    public function store(TagStoreRequest $request)
    {
        try {
            $data = $request->validated();
            $response = $this->tagStoreService->store($data);
            return response()->json([
                'message' => 'Тег создан',
                'data' => $response], 201);
        } catch (\Exception $exception) {
            return response()->json([
                'error' => 'Ошибка при создании тега',
                'message' => $exception->getMessage(),
            ], 500);
        }
    }


    public function show(string $id)
    {
        //
    }


    public function update(TagStoreRequest $request, Tag $tag)
    {
        try {
            $data = $request->validated();
            $response = $this->tagUpdateService->update($data, $tag);
            return response()->json([
                'message' => 'Тег обновлен',
                'data' => $response], 201);
        } catch (\Exception $exception) {
            return response()->json([
                'error' => 'Ошибка при обновлении тега',
                'message' => $exception->getMessage(),
            ], 500);
        }
    }


    public function destroy(string $id)
    {
        //
    }
}
