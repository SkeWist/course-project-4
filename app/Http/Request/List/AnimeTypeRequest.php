<?php

namespace App\Http\Request\List;

use Illuminate\Foundation\Http\FormRequest;

class AnimeTypeRequest extends FormRequest
{
    /**
     * Определяет, может ли пользователь делать этот запрос.
     */
    public function authorize(): bool
    {
        return true; // Здесь можно добавить логику авторизации, если требуется
    }

    /**
     * Правила валидации для запроса.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:anime_types,name', // Название типа должно быть уникальным
        ];
    }

    /**
     * Сообщения об ошибках валидации.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Поле "Название типа" обязательно для заполнения.',
            'name.string' => 'Название типа должно быть строкой.',
            'name.max' => 'Название типа не может превышать 255 символов.',
            'name.unique' => 'Тип аниме с таким названием уже существует.',
        ];
    }
}
