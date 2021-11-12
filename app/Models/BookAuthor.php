<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookAuthor extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id',
        'book_id'
    ];

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id', 'id');
    }
    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }
}