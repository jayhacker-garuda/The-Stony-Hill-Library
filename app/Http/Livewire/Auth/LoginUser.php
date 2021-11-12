<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginUser extends Component
{
    public User $user;
    public $password;

    protected $rules = [
        'user.email' => 'required|email',
        'password' => 'required|min:8'
    ];

    public function updated($param)
    {
        $this->validateOnly($param);
    }

    public function donLogin()
    {
        // dd('yes');
        $this->validate();

        if (Auth::attempt(['email' => $this->user->email, 'password' => $this->password])) {

            $this->redirect(route('librarian.dashboard'));
            session()->flash('success', 'Login Successful');
        }

        session()->flash('error', trans('auth.failed'));
        // $this->addError('error',trans('auth.password'));
    }

    public function mount()
    {
        $this->user = new User;
    }

    public function render()
    {
        return view('livewire.auth.login-user');
    }
}