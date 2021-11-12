<?php

namespace App\Http\Livewire\Librarian\Crud;

use App\Models\Author;
use App\Models\Book;
use App\Models\BookAuthor;
use App\Models\BookType;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class AddBook extends Component
{

    use WithPagination;
    public Author $author;
    public Book $book;
    public $editMode;

    protected $rules = [
        'author.name' => 'required|string',
        'book.title' => 'required|string',
        'book.category_id' => 'required',
        'book.book_type_id' => 'required',
        'book.quantity' => 'required'
    ];

    protected $validationAttributes = [
        'author.name' => 'Author Name',
        'book.title' => 'Book Title',
        'book.category_id' => 'Category',
        'book.book_type_id' => 'Book Type',
        'book.quantity' => 'Book Quantity'
    ];


    public function updated($param)
    {
        $this->validateOnly($param);
    }


    public function addBook()
    {
        $this->validate();

        $authorData = Author::create([
            'name' => $this->author->name
        ]);

        $bookData = Book::create([
            'title' => $this->book->title,
            'category_id' => $this->book->category_id,
            'book_type_id' => $this->book->book_type_id,
            'quantity' => $this->book->quantity,
        ]);

        $bookAdded = BookAuthor::create([
            'author_id' => $authorData->id,
            'book_id' => $bookData->id
        ]);

        session()->flash('success', 'data Added');
    }

    public function editBook(BookAuthor $bookAuthor)
    {
        // dd($bookAuthor);
        $this->editMode = $bookAuthor;

        $aData = Author::where('id', $bookAuthor->author_id)->get();
        $bData = Book::where('id', $bookAuthor->book_id)->get();
        // dd($aData);

        $this->author->name = $aData[0]->name;
        $this->book->title = $bData[0]->title;
        $this->book->category_id = $bData[0]->category_id;
        $this->book->book_type_id = $bData[0]->book_type_id;
        $this->book->quantity = $bData[0]->quantity;
    }

    public function updateBook(BookAuthor $bookAuthor)
    {
        // dd($bookAuthor);
        Author::where('id', $bookAuthor->author_id)->update([
            'name' => $this->author->name
        ]);

        Book::where('id', $bookAuthor->book_id)->update([
            'title' => $this->book->title,
            'category_id' => $this->book->category_id,
            'book_type_id' => $this->book->book_type_id,
            'quantity' => $this->book->quantity,
        ]);

        $this->editMode = false;

        $this->book->title = "";
        $this->book->category_id = "";
        $this->book->book_type_id = "";
        $this->book->quantity = "";

        session()->flash('success', 'Data Updated');

    }
    public function deleteBook(BookAuthor $bookAuthor)
    {
        // dd($bookAuthor);
        Book::where('id', $bookAuthor->book_id)->delete();
        $bookAuthor->delete();
        session()->flash('success', 'Data Deleted');

    }
    public function mount()
    {
        $this->author = new Author;
        $this->book = new Book;
    }
    public function render()
    {
        $categories = Category::all('id','name');
        $books = BookAuthor::orderBy('id', 'desc')->paginate(5);
        $types = BookType::all('id', 'name');
        return view('livewire.librarian.crud.add-book', [
            'categories' => $categories,
            'books' => $books,
            'types' => $types
        ]);
    }
}