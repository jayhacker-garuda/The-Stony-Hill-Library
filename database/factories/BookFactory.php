<?php

namespace Database\Factories;

use App\Models\BookType;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(20),
            'category_id' => rand(1, Category::count()),
            'book_type_id' => rand(1, BookType::count()),
            'quantity' => rand(1, 15)
        ];
    }
}
