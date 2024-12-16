<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Массив скриншотов с привязкой к anime_id
        $galleries = [
            [
                'anime_id' => 1, // ID существующего аниме
                'image_path' => 'gallery_images/Afro1.jpg',
            ],
            [
                'anime_id' => 1, // ID существующего аниме
                'image_path' => 'gallery_images/Afro2.jpg',
            ],
            [
                'anime_id' => 1, // ID существующего аниме
                'image_path' => 'gallery_images/Afro3.jpg',
            ],
            [
                'anime_id' => 1, // ID существующего аниме
                'image_path' => 'gallery_images/Afro4.jpg',
            ],
            [
                'anime_id' => 1, // ID существующего аниме
                'image_path' => 'gallery_images/Afro5.jpg',
            ],
            [
                'anime_id' => 2, // ID существующего аниме
                'image_path' => 'gallery_images/Berserk1.png',
            ],
            [
                'anime_id' => 2, // ID существующего аниме
                'image_path' => 'gallery_images/Berserk2.png',
            ],
            [
                'anime_id' => 2, // ID существующего аниме
                'image_path' => 'gallery_images/Berserk3.png',
            ],
            [
                'anime_id' => 3, // ID существующего аниме
                'image_path' => 'gallery_images/Bleach1.jpg',
            ],
            [
                'anime_id' => 3, // ID существующего аниме
                'image_path' => 'gallery_images/Bleach2.jpg',
            ],
            [
                'anime_id' => 3, // ID существующего аниме
                'image_path' => 'gallery_images/Bleach3.jpg',
            ],
            [
                'anime_id' => 3, // ID существующего аниме
                'image_path' => 'gallery_images/Bleach4.jpg',
            ],
            [
                'anime_id' => 3, // ID существующего аниме
                'image_path' => 'gallery_images/Bleach5.jpg',
            ],
            [
                'anime_id' => 4, // ID существующего аниме
                'image_path' => 'gallery_images/Cowboy1.jpg',
            ],
            [
                'anime_id' => 4, // ID существующего аниме
                'image_path' => 'gallery_images/Cowboy2.jpg',
            ],
            [
                'anime_id' => 4, // ID существующего аниме
                'image_path' => 'gallery_images/Cowboy3.jpg',
            ],
            [
                'anime_id' => 4, // ID существующего аниме
                'image_path' => 'gallery_images/Cowboy4.jpg',
            ],
            [
                'anime_id' => 5, // ID существующего аниме
                'image_path' => 'gallery_images/Dandan1.jpg',
            ],
            [
                'anime_id' => 5, // ID существующего аниме
                'image_path' => 'gallery_images/Dandan2.jpg',
            ],
            [
                'anime_id' => 5, // ID существующего аниме
                'image_path' => 'gallery_images/Dandan3.jpg',
            ],
            [
                'anime_id' => 5, // ID существующего аниме
                'image_path' => 'gallery_images/Dandan4.jpg',
            ],
            [
                'anime_id' => 5, // ID существующего аниме
                'image_path' => 'gallery_images/Dandan5.jpg',
            ],
            [
                'anime_id' => 6, // ID существующего аниме
                'image_path' => 'gallery_images/Abyus1.jpg',
            ],
            [
                'anime_id' => 6, // ID существующего аниме
                'image_path' => 'gallery_images/Abyus2.jpg',
            ],
            [
                'anime_id' => 6, // ID существующего аниме
                'image_path' => 'gallery_images/Abyus3.png',
            ],
            [
                'anime_id' => 6, // ID существующего аниме
                'image_path' => 'gallery_images/Abyus4.png',
            ],
            [
                'anime_id' => 7, // ID существующего аниме
                'image_path' => 'gallery_images/Magic1.jpg',
            ],
            [
                'anime_id' => 7, // ID существующего аниме
                'image_path' => 'gallery_images/Magic2.jpg',
            ],
            [
                'anime_id' => 7, // ID существующего аниме
                'image_path' => 'gallery_images/Magic3.jpg',
            ],
            [
                'anime_id' => 7, // ID существующего аниме
                'image_path' => 'gallery_images/Magic4.jpg',
            ],
            [
                'anime_id' => 8, // ID существующего аниме
                'image_path' => 'gallery_images/Dororo1.jpg',
            ],
            [
                'anime_id' => 8, // ID существующего аниме
                'image_path' => 'gallery_images/Dororo2.jpg',
            ],
            [
                'anime_id' => 8, // ID существующего аниме
                'image_path' => 'gallery_images/Dororo3.jpg',
            ],
            [
                'anime_id' => 8, // ID существующего аниме
                'image_path' => 'gallery_images/Dororo4.jpg',
            ],
            [
                'anime_id' => 8, // ID существующего аниме
                'image_path' => 'gallery_images/Dororo5.jpg',
            ],
            [
                'anime_id' => 9, // ID существующего аниме
                'image_path' => 'gallery_images/JOJO1.jpg',
            ],
            [
                'anime_id' => 9, // ID существующего аниме
                'image_path' => 'gallery_images/JOJO2.jpg',
            ],
            [
                'anime_id' => 9, // ID существующего аниме
                'image_path' => 'gallery_images/JOJO3.jpg',
            ],
            [
                'anime_id' => 9, // ID существующего аниме
                'image_path' => 'gallery_images/JOJO4.jpg',
            ],
            [
                'anime_id' => 9, // ID существующего аниме
                'image_path' => 'gallery_images/JOJO5.jpg',
            ],
            [
                'anime_id' => 10, // ID существующего аниме
                'image_path' => 'gallery_images/UAJOJO1.jpg',
            ],
            [
                'anime_id' => 10, // ID существующего аниме
                'image_path' => 'gallery_images/UAJOJO2.jpg',
            ],
            [
                'anime_id' => 10, // ID существующего аниме
                'image_path' => 'gallery_images/UAJOJO3.jpg',
            ],
            [
                'anime_id' => 10, // ID существующего аниме
                'image_path' => 'gallery_images/UAJOJO4.jpg',
            ],
            [
                'anime_id' => 11, // ID существующего аниме
                'image_path' => 'gallery_images/HMagic.jpg',
            ],
            [
                'anime_id' => 11, // ID существующего аниме
                'image_path' => 'gallery_images/HMagic2.jpg',
            ],
            [
                'anime_id' => 11, // ID существующего аниме
                'image_path' => 'gallery_images/HMagic3.jpg',
            ],
            [
                'anime_id' => 11, // ID существующего аниме
                'image_path' => 'gallery_images/HMagic4.jpg',
            ],
            [
                'anime_id' => 11, // ID существующего аниме
                'image_path' => 'gallery_images/HMagic5.jpg',
            ],
            [
                'anime_id' => 12, // ID существующего аниме
                'image_path' => 'gallery_images/Slime1.jpg',
            ],
            [
                'anime_id' => 12, // ID существующего аниме
                'image_path' => 'gallery_images/Slime2.jpg',
            ],
            [
                'anime_id' => 12, // ID существующего аниме
                'image_path' => 'gallery_images/Slime3.jpg',
            ],
            [
                'anime_id' => 12, // ID существующего аниме
                'image_path' => 'gallery_images/Slime4.jpg',
            ],
            [
                'anime_id' => 12, // ID существующего аниме
                'image_path' => 'gallery_images/Slime5.jpg',
            ],
            [
                'anime_id' => 13, // ID существующего аниме
                'image_path' => 'gallery_images/Naruto1.jpg',
            ],
            [
                'anime_id' => 13, // ID существующего аниме
                'image_path' => 'gallery_images/Naruto2.jpg',
            ],
            [
                'anime_id' => 13, // ID существующего аниме
                'image_path' => 'gallery_images/Naruto3.jpg',
            ],
            [
                'anime_id' => 13, // ID существующего аниме
                'image_path' => 'gallery_images/Naruto4.jpg',
            ],
            [
                'anime_id' => 13, // ID существующего аниме
                'image_path' => 'gallery_images/Naruto5.jpg',
            ],
            [
                'anime_id' => 14, // ID существующего аниме
                'image_path' => 'gallery_images/OnePiece1.jpg',
            ],
            [
                'anime_id' => 14, // ID существующего аниме
                'image_path' => 'gallery_images/OnePiece2.jpg',
            ],
            [
                'anime_id' => 14, // ID существующего аниме
                'image_path' => 'gallery_images/OnePiece3.jpg',
            ],
            [
                'anime_id' => 14, // ID существующего аниме
                'image_path' => 'gallery_images/OnePiece4.jpg',
            ],
            [
                'anime_id' => 14, // ID существующего аниме
                'image_path' => 'gallery_images/OnePiece5.jpg',
            ],
            [
                'anime_id' => 15, // ID существующего аниме
                'image_path' => 'gallery_images/OnePunch1.jpg',
            ],
            [
                'anime_id' => 15, // ID существующего аниме
                'image_path' => 'gallery_images/OnePunch2.jpg',
            ],
            [
                'anime_id' => 15, // ID существующего аниме
                'image_path' => 'gallery_images/OnePunch3.jpg',
            ],
            [
                'anime_id' => 15, // ID существующего аниме
                'image_path' => 'gallery_images/OnePunch4.jpg',
            ],
            [
                'anime_id' => 16, // ID существующего аниме
                'image_path' => 'gallery_images/Teacher1.jpg',
            ],
            [
                'anime_id' => 16, // ID существующего аниме
                'image_path' => 'gallery_images/Teacher2.jpg',
            ],
            [
                'anime_id' => 16, // ID существующего аниме
                'image_path' => 'gallery_images/Teacher3.jpg',
            ],
            [
                'anime_id' => 16, // ID существующего аниме
                'image_path' => 'gallery_images/Teacher4.jpg',
            ],
            [
                'anime_id' => 16, // ID существующего аниме
                'image_path' => 'gallery_images/Teacher5.jpg',
            ],
            [
                'anime_id' => 17, // ID существующего аниме
                'image_path' => 'gallery_images/Overlord1.jpg',
            ],
            [
                'anime_id' => 17, // ID существующего аниме
                'image_path' => 'gallery_images/Overlord2.jpg',
            ],
            [
                'anime_id' => 17, // ID существующего аниме
                'image_path' => 'gallery_images/Overlord3.jpg',
            ],
            [
                'anime_id' => 17, // ID существующего аниме
                'image_path' => 'gallery_images/Overlord4.jpg',
            ],
            [
                'anime_id' => 17, // ID существующего аниме
                'image_path' => 'gallery_images/Overlord5.jpg',
            ],
            [
                'anime_id' => 18, // ID существующего аниме
                'image_path' => 'gallery_images/SDS1.jpg',
            ],
            [
                'anime_id' => 18, // ID существующего аниме
                'image_path' => 'gallery_images/SDS2.jpg',
            ],
            [
                'anime_id' => 18, // ID существующего аниме
                'image_path' => 'gallery_images/SDS3.jpg',
            ],
            [
                'anime_id' => 18, // ID существующего аниме
                'image_path' => 'gallery_images/SDS4.jpg',
            ],
            [
                'anime_id' => 19, // ID существующего аниме
                'image_path' => 'gallery_images/Totoro1.jpg',
            ],
            [
                'anime_id' => 19, // ID существующего аниме
                'image_path' => 'gallery_images/Totoro2.jpg',
            ],
            [
                'anime_id' => 19, // ID существующего аниме
                'image_path' => 'gallery_images/Totoro3.jpg',
            ],
            [
                'anime_id' => 19, // ID существующего аниме
                'image_path' => 'gallery_images/Totoro4.jpg',
            ],
        ];

        // Убедитесь, что папка "screenshots" существует
        Storage::disk('public')->makeDirectory('screenshots');

        // Генерация фиктивных файлов для скриншотов (если они отсутствуют)
        foreach ($galleries as $gallery) {
            $filePath = storage_path('app/public/' . $gallery['image_path']);
            if (!file_exists($filePath)) {
                file_put_contents($filePath, 'Fake screenshot content');
            }
        }

        // Добавление данных в таблицу galleries
        DB::table('galleries')->insert($galleries);
    }
}
