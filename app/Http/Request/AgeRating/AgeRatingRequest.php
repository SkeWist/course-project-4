<?php


namespace App\Http\Request\AgeRating;

use Illuminate\Foundation\Http\FormRequest;

class AgeRatingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Здесь можно добавить логику авторизации, если требуется
    }
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:age_ratings,name', // Название должно быть уникальным и до 255 символов
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Поле "Название возрастного рейтинга" обязательно для заполнения.',
            'name.string' => 'Название возрастного рейтинга должно быть строкой.',
            'name.max' => 'Название возрастного рейтинга не может превышать 255 символов.',
            'name.unique' => 'Возрастной рейтинг с таким названием уже существует.',
        ];
    }
}
