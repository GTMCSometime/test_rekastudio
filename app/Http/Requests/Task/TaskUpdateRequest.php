<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class TaskUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'title' => 'sometimes|string|min:3|max:20',
            'text' => 'sometimes|string|max:200',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id'
        ];
    }
}
