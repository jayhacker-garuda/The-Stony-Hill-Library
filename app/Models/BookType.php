<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];


    public function books()
    {
        return $this->hasMany(Book::class,'book_type_id', 'id');
    }
}