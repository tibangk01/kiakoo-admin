<?php

namespace App\View\Components\Auth\Passwords;

use Illuminate\View\Component;

class Login extends Component
{
    public function __construct()
    {
        //
    }

    public function render()
    {
        return view('components.auth.passwords.login');
    }
}
