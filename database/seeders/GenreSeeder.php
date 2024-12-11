<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    public function run()
    {
        $genres = [
            'Экшен', //1
            'Приключение', //2
            'Комедия', //3
            'Драма', //4
            'Фэнтези', //5
            'Ужасы', //6
            'Романтика', //7
            'Фантастика', //8
            'Сверхъестественное', //9
            'Магия', //10
            'Сёнен', //11
            'Этти', //12
            'Игры', //13
            'Повседневность', //14
            'Школа', //15
            'Пародия', //16
            'Супер сила', //17
            'Сэйнен', //18
            'Боевые искусства', //19
            'Вампиры', //20
            'Демоны', //21
            'Исторический', //22
            'Самураи', //23
            'Психологическое', //24
            'Триллер', //25
            'Детектив', //26
            'Космос', //27
            'Военное' //28
            ];

        foreach ($genres as $genre) {
            DB::table('genres')->insert([
                'name' => $genre,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
