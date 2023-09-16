<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Room;
use App\Models\User;
use App\Models\Image;
use App\Models\Address;
use App\Models\Comment;
use App\Models\Company;
use App\Models\Reservation;
use Database\Seeders\Likeables;
use Illuminate\Database\Seeder;
use Database\Seeders\CityRoomSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Company::factory(10)->create();
        User::factory(10)->create();
        Address::factory(3)->create();
        Comment::factory(10)->create();
        Room::factory(10)->create();
        City::factory(10)->create();
        Reservation::factory(10)->create();
        $this->call(CityRoomSeeder::class);
        Image::factory(10)->create();
        $this->call(Likeables::class);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
