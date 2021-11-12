<?php

namespace App\Http\Livewire\Librarian\Crud;

use App\Models\Member;
use Livewire\Component;
use Livewire\WithPagination;

class AddMember extends Component
{
    use WithPagination;
    public Member $member;
    public $editMode;


    protected $rules = [
        'member.name' => 'required|string',
        'member.gender' => 'required|string',
        'member.dob' => 'required',
        'member.address' => 'required',
    ];

    protected $validationAttributes = [
        'member.name' => 'Member Name',
        'member.gender' => 'Member Gender',
        'member.dob' => 'Member Date Of Birth',
        'member.address' => 'Member Address',
    ];


    public function updated($param)
    {
        $this->validateOnly($param);
    }

    public function addMember()
    {
        $this->validate();

        Member::create([
            'name' => $this->member->name,
            'gender' => $this->member->gender,
            'dob' => $this->member->dob,
            'address' => $this->member->address,
        ]);


        session()->flash('success', 'data Added');
    }

    public function editMember(Member $member)
    {
        // dd($bookAuthor);
        $this->editMode = $member;

        $this->member->name = $member->name;
        $this->member->gender = $member->gender;
        $this->member->dob = $member->dob;
        $this->member->address = $member->address;

    }

    public function updateMember($id)
    {
        Member::where('id', $id)->update([
            'name' => $this->member->name,
            'gender' => $this->member->gender,
            'dob' => $this->member->dob,
            'address' => $this->member->address,
        ]);

        $this->editMode = false;

        $this->member->name = "";
        $this->member->gender = "";
        $this->member->dob = "";
        $this->member->address = "";

        session()->flash('success', 'Data Updated');
    }


    public function deleteMember(Member $member)
    {
        $member->delete();
        session()->flash('success', 'Data Deleted');

    }

    public function mount()
    {
        $this->member = new Member;
    }

    public function render()
    {
        $members = Member::orderBy('id', 'desc')->paginate(5);
        return view('livewire.librarian.crud.add-member', [
            'members' => $members
        ]);
    }
}