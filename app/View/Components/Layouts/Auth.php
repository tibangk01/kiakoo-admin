<?php

namespace App\View\Components\Layouts;

use Illuminate\View\Component;

class Auth extends Component
{
    public function __construct()
    {
        //
    }

    public function render()
    {
        return view('components.layouts.auth');
    }
}
