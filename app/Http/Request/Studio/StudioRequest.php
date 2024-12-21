<?php

namespace App\Http\Request\Studio;

use Illuminate\Foundation\Http\FormRequest;

class StudioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Здесь можно добавить логику авторизации, если требуется
    }
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:32|unique:studios,name', // Название должно быть уникальным и до 255 символов
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Поле "Название студии" обязательно для заполнения.',
            'name.string' => 'Название студии должно быть строкой.',
            'name.max' => 'Название студии не может превышать 32 символов.',
            'name.unique' => 'Студия с таким названием уже существует.',
        ];
    }
}
