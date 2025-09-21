<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB:: table('bands')->insert([
            'name' => 'ABBA',
            'photo' => 'imageABBA.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [
            'name' => 'Aerosmith',
            'photo' => 'imageAerosmith.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'Queen',
            'photo' => 'imageQueen.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
