<?php

namespace App\Http\Request\Character;

use Illuminate\Foundation\Http\FormRequest;

class CharacterStoreRequest extends FormRequest
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
            'audio'       => 'nullable|mimes:mp3,wav|max:5120', // Только mp3/wav файлы до 5 МБ
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
