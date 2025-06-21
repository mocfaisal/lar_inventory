<?php

namespace App\Livewire\Frontend\Auth;

use Livewire\Component;

class Login extends Component
{
    public $input_email;
    public $password;


    public function render()
    {
        return view('livewire.frontend.auth.login')->layout('livewire.components.layouts.frontend.auth.app');
    }


}
