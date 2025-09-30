<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pet;
use Carbon\Carbon;


class PetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $currentTimestamp = Carbon::now();
        Pet::insert([
            [
                'name' => 'Bella',
                'species' => 'Dog',
                'age' => 3,
                'description' => 'A friendly golden retriever.',
                'image' => 'bella.webp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Whiskers',
                'species' => 'Cat',
                'age' => 2,
                'description' => 'A playful tabby cat.',
                'image' => 'whiskers.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Coco',
                'species' => 'Parrot',
                'age' => 4,
                'description' => 'A talkative parrot.',
                'image' => 'coco.webp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Max',
                'species' => 'Dog',
                'age' => 5,
                'description' => 'Loves to play fetch.',
                'image' => 'max.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Luna',
                'species' => 'Cat',
                'age' => 1,
                'description' => 'Shy but affectionate kitten.',
                'image' => 'luna.webp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}