<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB:: table('albums')->insert([
            'band_id' => 1,
            'name' => 'Arrival',
            'image' => 'imageArrival.jpg',
            'release_date' => '1976-10-11',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [
            'band_id' => 2,
            'name' => 'Get a Grip',
            'image' => 'imageGetAGrip.jpg',
            'release_date' => '1993-04-20',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'band_id' => 3,
            'name' => 'A Night at the Opera',
            'image' => 'imageANightAtTheOpera.jpg',
            'release_date' => '1975-11-21',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
