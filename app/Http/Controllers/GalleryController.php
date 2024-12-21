<?php

namespace App\Http\Controllers;

use App\Http\Request\Gallery\AddFrameRequest;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Models\Anime;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    public function index()
    {
        $gallery = Gallery::all();
        return response()->json($gallery, 200);
    }

    public function show($id)
    {
        $gallery = Gallery::findOrFail($id);
        return response()->json($gallery, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'anime_id' => 'required|exists:anime,id',
        ]);

        $path = $request->file('image')->store('AnimeTitle', 'public');

        $gallery = Gallery::create([
            'anime_id' => $request->anime_id,
            'image_url' => Storage::url($path), // Генерация публичного URL
        ]);

        return response()->json($gallery, 201);
    }
    public function addGalleryImages(AddFrameRequest $request, $anime_id)
    {
        $anime = Anime::findOrFail($anime_id);

        $images = [];
        foreach ($request->file('images') as $image) {
            $path = $image->store('gallery_images', 'public');

            $images[] = Gallery::create([
                'anime_id' => $anime->id,
                'image_path' => $path,
            ]);
        }

        return response()->json([
            'message' => 'Изображения успешно загружены!',
            'data' => $images,
        ], 201);
    }

    public function getGalleryImages($anime_id)
    {
        $images = Gallery::where('anime_id', $anime_id)->get();

        if ($images->isEmpty()) {
            return response()->json(['message' => 'Изображения не найдены для этого аниме.'], 404);
        }

        $images = $images->map(function ($image) {
            $image->image_url = asset('storage/' . $image->image_path);
            return $image;
        });

        return response()->json($images, 200);
    }
    public function deleteFrame($id)
    {
        $galleryItem = Gallery::find($id);

        if (!$galleryItem) {
            return response()->json([
                'message' => 'Картинка с таким ID не найдена.',
            ], 404);
        }

        try {
            $galleryItem->delete();

            return response()->json([
                'message' => 'Картинка успешно удалена.',
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Произошла ошибка при удалении картинки: ' . $e->getMessage(),
            ], 500);
        }
    }
}
