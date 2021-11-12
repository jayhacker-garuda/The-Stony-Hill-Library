<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\BookAuthor;
use App\Models\Member;
use Database\Factories\MemberFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            LibSeeder::class,
            CategorySeeder::class,
            BookTypeSeeder::class
        ]);
        Author::factory(5)->create();
        Book::factory(10)->create();
        BookAuthor::factory(Author::count())->create();


    }
}