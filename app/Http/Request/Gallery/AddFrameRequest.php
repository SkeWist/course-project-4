<?php

namespace App\Http\Request\Gallery;

use App\Http\Request\ApiRequest;


class AddFrameRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'image.required' => 'Кадр обязателен для загрузки.',
            'image.image' => 'Файл должен быть изображением.',
            'image.mimes' => 'Допустимые форматы изображения: jpeg, png, jpg, gif.',
            'image.max' => 'Размер изображения не должен превышать 2 МБ.',
        ];
    }
}
