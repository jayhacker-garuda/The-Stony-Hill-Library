<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Love',
        ]);
        Category::create([
            'name' => 'Life',
        ]);
        Category::create([
            'name' => 'Documentary',
        ]);
        Category::create([
            'name' => 'Novel',
        ]);
        Category::create([
            'name' => 'Poem',
        ]);
    }
}
