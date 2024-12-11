<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudioSeeder extends Seeder
{
    public function run()
    {
        $studios = [
            'Studio Ghibli',
            'Toei Animation',
            'Madhouse Studios',
            'Sunrise',
            'Bones',
            'MAPPA',
            'A-1 Pictures Inc.',
            'Studio Pierrot',
            '8bit',
            'Asahi Production',
            'David Production',
            'Tezuka Production',
            'SHAFT',
            'Kinema Citrus',
            'Science SARU',
            'Oriental Light and Magic',
            'Gonzo',
            'production doA'
            ];

        foreach ($studios as $studio) {
            DB::table('studios')->insert([
                'name' => $studio,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
