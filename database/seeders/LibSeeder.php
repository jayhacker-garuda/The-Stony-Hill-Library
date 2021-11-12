<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class LibSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'shamjay',
            'email' => 'sham@library.com',
            'user_type' =>'librarian',
            'password' => bcrypt('12345678')
        ]);
    }
}
