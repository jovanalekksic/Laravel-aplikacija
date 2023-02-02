<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Genre;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Book;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Genre::truncate();
        User::truncate();

        $user = User::factory()->create();

        $genre1 = Genre::create([
            "name" => "Fantasy"
        ]);
        $genre2 = Genre::create([
            "name" => "Drama"
        ]);
        $genre3 = Genre::create([
            "name" => "Thriller"
        ]);

        // $table->id();
        //     $table->string('name')->unique();
        //     $table->foreignId('genre_id');
        //     $table->string('title');
        //     $table->string('author');
        //     $table->text('description');

        $book1 = Book::create([
            "name" => "two-towers",
            "genre_id" => $genre1->id,
            "title" => "Two Towers",
            "author" => "J.R.R.Tolkien",
            "description" => "Awakening from a dream of Gandalf fighting the Balrog in Moria, Frodo Baggins finds himself, along with Samwise Gamgee, lost in the Emyn Muil near Mordor. They discover that they are being tracked by Gollum, a former bearer of the One Ring. Capturing Gollum, Frodo takes pity and allows him to guide them, reminding Sam that they will need Gollum's help to infiltrate Mordor.",
            "user_id" => $user->id
        ]);
        $book2 = Book::create([
            "name" => "summer",
            "genre_id" => $genre2->id,
            "title" => "Summer",
            "author" => "Tova Johnson",
            "description" => "An elderly artist and her six-year-old granddaughter while away a summer together on a tiny island in the gulf of Finland. Gradually, the two learn to adjust to each other's fears, whims and yearnings for independence, and a fierce yet understated love emerges - one that encompasses not only the summer inhabitants but the island itself, with its mossy rocks, windswept firs and unpredictable seas.",
            "user_id" => $user->id
        ]);
        $book3 = Book::create([
            "name" => "the-mist",
            "genre_id" => $genre3->id,
            "title" => "The Mist",
            "author" => "Stephen King",
            "description" => "The morning after a severe thunderstorm left the area without electrical power, an unnaturally thick and straight-edged cloud of mist spreads across the small town of Bridgton, Maine, bringing with it a whole ecosystem of deadly creatures. The source of this mist is never determined, but there are indications that it was caused by the storm disrupting experiments being conducted at a nearby U.S. military installation under the rumored name Project Arrowhead.",
            "user_id" => $user->id
        ]);
    }
}
