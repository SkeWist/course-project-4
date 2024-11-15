<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'voice_actor',
        'description',
        'anime_id',
        'audio_path', // путь к звуковой дорожке
    ];

    // Отношение персонажа к аниме
    public function anime()
    {
        return $this->belongsTo(Anime::class);
    }
}
