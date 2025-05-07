<?php

namespace App\Http\Controllers\Tag;

use App\Http\Requests\Tag\TagStoreRequest;
use App\Models\Tag;

class TagController extends TagBaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagStoreRequest $request)
    {
        $data = $request->validated();
        $response = $this->tagStoreService->store($data);
        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TagStoreRequest $request, Tag $tag)
    {
        $data = $request->validated();
        $response = $this->tagUpdateService->update($data, $tag);
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
