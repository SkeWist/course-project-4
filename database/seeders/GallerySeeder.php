<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class GallerySeeder extends Seeder
{
    public function run()
    {
        // Массив с URL-адресами изображений
        $images = [
            'https://example.com/images/gallery1.jpg',
            'https://example.com/images/gallery2.jpg',
            'https://example.com/images/gallery3.jpg',
            'https://example.com/images/gallery4.jpg',
            'https://example.com/images/gallery5.jpg',
            'https://example.com/images/gallery6.jpg',
            'https://example.com/images/gallery7.jpg',
            'https://example.com/images/gallery8.jpg',
            'https://example.com/images/gallery9.jpg',
            'https://example.com/images/gallery10.jpg',
            'https://example.com/images/gallery11.jpg',
            'https://example.com/images/gallery12.jpg',
            'https://example.com/images/gallery13.jpg',
            'https://example.com/images/gallery14.jpg',
            'https://example.com/images/gallery15.jpg',
            'https://example.com/images/gallery16.jpg',
            'https://example.com/images/gallery17.jpg',
            'https://example.com/images/gallery18.jpg',
            'https://example.com/images/gallery19.jpg',
            'https://example.com/images/gallery20.jpg',
        ];

        // Вставка изображений в таблицу gallery
        foreach ($images as $image) {
            DB::table('gallery')->insert([
                'image_url' => $image,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
