<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules (Request $request): array
    {
        return [
            'task_date' => ['required', 'date'],
            'number' => ['nullable', 'string', 'max:30'],
            'task_name' => ['required', 'string', 'max:700'],
            'item' => ['nullable', 'string', 'max:20'],
            'task' => ['required', 'string'],
            'note' => ['nullable', 'string'],
            'deadline' => ['required', 'date'],
            'task_status_id' => ['required', 'integer'],
            'users' => ['nullable', 'array'],
            'users.*' => ['nullable', 'integer', 'exists:users,id'],
        ];
    }
}
