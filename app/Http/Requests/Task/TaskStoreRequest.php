<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class TaskStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'title' => 'required|string|min:3|max:20',
            'text' => 'required|string|max:200',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id'
        ];
    }
}
