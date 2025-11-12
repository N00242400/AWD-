<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Owner;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Owner::insert([
            ['name' => 'John Long','email'=> 'johnlong@gmail.com','phone_number'=>'0833213345','image'=>'johnlong.png'],
            ['name' => 'Emily Carter', 'email' => 'emilycarter@gmail.com', 'phone_number' => '0812345678', 'image' => 'emilycarter.png'],
            ['name' => 'Marcus Reed', 'email' => 'marcus.reed@yahoo.com', 'phone_number' => '0828765432', 'image' => 'marcusreed.png'],
            ['name' => 'Sophia Nguyen', 'email' => 'sophia.nguyen@hotmail.com', 'phone_number' => '0834455667', 'image' => 'sophianguyen.png'],
            ['name' => 'David Johnson', 'email' => 'david.johnson@gmail.com', 'phone_number' => '0856677889', 'image' => 'davidjohnson.png']
        ]);
    }
}
