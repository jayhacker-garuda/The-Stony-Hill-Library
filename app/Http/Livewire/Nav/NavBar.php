<?php

namespace App\Http\Livewire\Nav;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NavBar extends Component
{

    public function donLogout()
    {
        Auth::logout();
        $this->redirect(route('login'));
    }

    public function render()
    {
        return view('livewire.nav.nav-bar');
    }
}
