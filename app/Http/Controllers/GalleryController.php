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
    // Получение всех изображений галереи
    public function index()
    {
        $gallery = Gallery::all();
        return response()->json($gallery, 200);
    }

    // Получение изображения галереи по ID
    public function show($id)
    {
        $gallery = Gallery::findOrFail($id);
        return response()->json($gallery, 200);
    }

    // Создание нового изображения галереи
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Валидация для файла изображения
            'anime_id' => 'required|exists:anime,id', // Валидация для anime_id
        ]);

        // Сохранение изображения в папку AnimeTitle
        $path = $request->file('image')->store('AnimeTitle', 'public');

        // Создание записи в базе данных
        $gallery = Gallery::create([
            'anime_id' => $request->anime_id,
            'image_url' => Storage::url($path), // Генерация публичного URL
        ]);

        return response()->json($gallery, 201);
    }
    public function addGalleryImages(AddFrameRequest $request, $anime_id)
    {
        // Проверяем существование аниме
        $anime = Anime::findOrFail($anime_id);

        // Сохраняем изображения
        $images = [];
        foreach ($request->file('images') as $image) {
            $path = $image->store('gallery_images', 'public');

            // Создаем запись в базе данных
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

    // Метод для получения изображений для конкретного аниме
    public function getGalleryImages($anime_id)
    {
        // Получаем все изображения для указанного аниме
        $images = Gallery::where('anime_id', $anime_id)->get();

        if ($images->isEmpty()) {
            return response()->json(['message' => 'Изображения не найдены для этого аниме.'], 404);
        }

        // Формируем полный путь для изображений
        $images = $images->map(function ($image) {
            $image->image_url = asset('storage/' . $image->image_path);
            return $image;
        });

        return response()->json($images, 200);
    }
    public function deleteFrame($id)
    {
        // Поиск кадра по ID
        $galleryItem = Gallery::find($id);

        // Проверка, существует ли кадр с таким ID
        if (!$galleryItem) {
            return response()->json([
                'message' => 'Картинка с таким ID не найдена.',
            ], 404);
        }

        // Удаление кадра
        try {
            $galleryItem->delete();

            // Возвращаем успешный ответ
            return response()->json([
                'message' => 'Картинка успешно удалена.',
            ], 200);

        } catch (\Exception $e) {
            // В случае ошибки, возвращаем сообщение об ошибке
            return response()->json([
                'message' => 'Произошла ошибка при удалении картинки: ' . $e->getMessage(),
            ], 500);
        }
    }
}
