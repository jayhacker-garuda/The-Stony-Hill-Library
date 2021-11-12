<?php

use App\Http\Livewire\Auth\LoginUser;
use App\Http\Livewire\Librarian\Crud\AddBook;
use App\Http\Livewire\Librarian\Crud\AddMember;
use App\Http\Livewire\Librarian\Crud\BookRental;
use App\Http\Livewire\Librarian\Dashboard as LibrarianDashboard;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/login', LoginUser::class)->name('login');

Route::middleware(['auth'])->group(function () {

    Route::get('/', LibrarianDashboard::class)->name('librarian.dashboard');
    Route::get('/librarian/add/book', AddBook::class)->name('librarian.add.book');
    Route::get('/librarian/add/member', AddMember::class)->name('librarian.add.member');
    Route::get('/librarian/book/rental', BookRental::class)->name('librarian.book.rental');

});
