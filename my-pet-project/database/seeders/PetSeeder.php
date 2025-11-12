<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pet;
use App\Models\Owner;
use Carbon\Carbon;

class PetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
  function run(): void
    {
        $currentTimestamp = Carbon::now();
        //create a list of pets
        $pets = [
            [
                'name' => 'Bella',
                'species' => 'Dog',
                'age' => 3,
                'description' => 'A friendly golden retriever.',
                'image' => 'bella.webp',
            ],
            [
                'name' => 'Whiskers',
                'species' => 'Cat',
                'age' => 2,
                'description' => 'A playful tabby cat.',
                'image' => 'whiskers.jpg',
            ],
            [
                'name' => 'Coco',
                'species' => 'Parrot',
                'age' => 4,
                'description' => 'A talkative parrot.',
                'image' => 'coco.webp',
            ],
            [
                'name' => 'Max',
                'species' => 'Dog',
                'age' => 5,
                'description' => 'Loves to play fetch.',
                'image' => 'max.jpg',
            ],
            [
                'name' => 'Lunar',
                'species' => 'Cat',
                'age' => 1,
                'description' => 'Shy but affectionate kitten.',
                'image' => 'luna.webp',
            ],
            [
                'name' => 'Chirpy',
                'species' => 'Bird',
                'age' => 3,
                'description' => 'Sings beautifully every morning.',
                'image' => 'chirpy.jpg',
            ],
        ];

        //insert pet into pet table//
        foreach ($pets as $petData) {
            $pet = Pet::create(array_merge($petData, ['created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp]));

        //randomly select two owners//
        //ownerseeder must be executed beforepetseeder//
        $owners = Owner::inRandomOrder()->take(2)->pluck('id');

        //attach owners to pets//
        //attach() inserts a row in the pivot table//
        $pet->owners()->attach($owners);


    }
}
}