<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AnimeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'studio_id' => $this->studio_id,
            'age_rating_id' => $this->age_rating_id,
            'anime_type_id' => $this->anime_type_id,
            'episode_count' => $this->episode_count,
            'rating' => $this->rating,
            'image_url' => $this->imagePath,
            'release_year' => $this->release_year,
            'genres' => $this->whenLoaded('genres', function () {
                return $this->genres->map(fn($genre) => [
                    'id' => $genre->id,
                    'name' => $genre->name
                ]);
            }),
        ];
    }
}
