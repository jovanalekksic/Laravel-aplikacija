<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Genre;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();

        Genre::create([
            "name" => "Fantasy"
        ]);
        Genre::create([
            "name" => "Drama"
        ]);
        Genre::create([
            "name" => "Thriller"
        ]);
    }
}
