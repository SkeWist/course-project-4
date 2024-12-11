<?php

namespace App\Http\Request\Character;

use Illuminate\Foundation\Http\FormRequest;

class CharacterUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'        => 'required|string|max:255',
            'voice_actor' => 'required|string|max:255',
            'description' => 'nullable|string',
            'anime_id'    => 'required|exists:animes,id',
            'audio_path'  => 'nullable|string', // Добавлено для аудиодорожек
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Имя персонажа обязательно.',
            'voice_actor.required' => 'Имя актёра озвучивания обязательно.',
            'anime_id.required' => 'Идентификатор аниме обязателен.',
            'anime_id.exists' => 'Аниме с таким идентификатором не найдено.',
        ];
    }
}
