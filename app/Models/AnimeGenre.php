<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimeGenre extends Model
{
    protected $table = 'anime_genres'; // Указываем таблицу
    protected $fillable = ['anime_id', 'genre_id']; // Разрешенные поля для массового заполнения

    public function anime() {
        return $this->belongsTo(Anime::class);
    }
    public function genre() {
        return $this->belongsTo(Genre::class);
    }
}
