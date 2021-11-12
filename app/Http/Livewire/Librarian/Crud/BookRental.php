<?php

namespace App\Http\Livewire\Librarian\Crud;

use App\Models\Book;
use App\Models\BookRental as ModelsBookRental;
use App\Models\Member;
use Carbon\Carbon;
use Livewire\Component;

class BookRental extends Component
{
    public ModelsBookRental $rental;
    public $editMode;
    public $rented;

    protected $rules = [
        'rental.member_id' => 'required',
        'rental.book_id' => 'required',

    ];

    public function updated($param)
    {
        $this->validateOnly($param);
    }



    public function addRental()
    {
        // dd('yes');
        $currentDateTime = Carbon::now();
        $newDateTime = date_add($currentDateTime, date_interval_create_from_date_string("14 days"));

        // dd($currentDateTime);

        $this->validate();
        ModelsBookRental::create([
            'member_id' => $this->rental->member_id,
            'book_id' => $this->rental->book_id,
            'status' => 'issued',
            'return_date' => date_format($newDateTime, 'Y-m-d')
        ]);

        session()->flash('success', 'data Added');
    }

    public function editRental(ModelsBookRental $rental)
    {
        $this->editMode = $rental;

        $this->rental->member_id = $rental->member_id;
        $this->rental->book_id = $rental->book_id;
        $this->rental->status = $rental->status;
    }

    public function updateRental($id)
    {
        $this->validate([
        'rental.status' => 'required',

        ]);
        ModelsBookRental::where('id', $id)->update([
            'member_id' => $this->rental->member_id,
            'book_id' => $this->rental->book_id,
            'status' => $this->rental->status,
        ]);


        $this->editMode = false;
        $this->rental->member_id = "";
        $this->rental->book_id = "";
        $this->rental->status = "";
        session()->flash('success', 'data Updated');
    }


    public function deleteRental(ModelsBookRental $rental)
    {
        $rental->delete();
        session()->flash('success', 'Data Deleted');

    }

    public function mount()
    {
        $this->rental = new ModelsBookRental;
    }
    public function render()
    {

        $members = Member::all();
        $books = Book::all();
        $rentals = ModelsBookRental::orderBy('id', 'desc')->paginate();
        return view('livewire.librarian.crud.book-rental', [
            'members' => $members,
            'books'=> $books,
            'rentals' => $rentals
        ]);

   }
}