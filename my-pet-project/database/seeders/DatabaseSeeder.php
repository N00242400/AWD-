<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
   //method that takes one or more seeder classes and runs them in order.//
    public function run(): void
    {
       //Runs the PetSeeder to add sample pets to the 'pets' table//
        $this->call(PetSeeder::class);
        //Runs the OwnerSeeder to add sample owners to the 'owners' table
        $this->call(OwnerSeeder::class);
    }
}
