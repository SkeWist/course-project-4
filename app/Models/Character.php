<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;


    protected $fillable = ['name', 'voice_actor', 'description', 'anime_id', 'audio_path', 'image_path'];

    protected $table = 'characters';

    // Отношение персонажа к аниме через промежуточную таблицу anime_character
    public function anime()
    {
        return $this->belongsTo(Anime::class, 'anime_id');
    }
}
