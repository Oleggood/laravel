<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
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
            'surname' => ['nullable', 'string', 'max:40'],
            'name' => ['required', 'string', 'max:40'],
            'patronymic' => ['nullable', 'string', 'max:40'],
            'birthday' => ['nullable', 'date'],
            'nickname' => ['required', 'integer', 'digits_between:1,3', Rule::unique('users')->ignore($request->get('id'))],
            'login' => ['required', 'string', Rule::unique('users')->ignore($request->get('id'))],
            'password' => ['string'],
            'note' => ['nullable', 'string', 'max:500'],
            'department_id' => ['nullable'],
            'position_id' => ['nullable'],
            'role_id' => ['nullable'],
        ];
    }
}
