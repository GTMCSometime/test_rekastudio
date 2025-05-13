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
        $data = $request->validated();
        $response = $this->tagStoreService->store($data);
        return $response;
    }


    public function show(string $id)
    {
        //
    }


    public function update(TagStoreRequest $request, Tag $tag)
    {
        $data = $request->validated();
        $response = $this->tagUpdateService->update($data, $tag);
        return $response;
    }


    public function destroy(string $id)
    {
        //
    }
}
