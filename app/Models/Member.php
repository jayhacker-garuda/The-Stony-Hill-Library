<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'dob',
        'gender',
        'address'
    ];


    public function book_rentals()
    {
        return $this->hasMany(BookRental::class,'book_id');
    }
}