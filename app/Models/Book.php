<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'category_id',
        'book_type_id',
        'quantity'
    ];

    public function book_authors()
    {
        return $this->hasMany(BookAuthor::class, 'book_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function book_type()
    {
        return $this->belongsTo(BookType::class, 'book_type_id', 'id');
    }

    public function book_rentals()
    {
        return $this->hasMany(BookRental::class,'book_id');
    }
}
