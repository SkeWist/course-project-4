<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $table = 'galleries'; // Если таблица называется gallery (в единственном числе)

    protected $fillable = [
        'anime_id',   // ID аниме, к которому привязано изображение
        'image_path', // Путь к изображению
    ];

    // Связь: изображение принадлежит одному аниме
    public function anime()
    {
        return $this->belongsTo(Anime::class);
    }
}
