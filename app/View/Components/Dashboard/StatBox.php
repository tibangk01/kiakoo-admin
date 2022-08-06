<?php

namespace App\View\Components\Dashboard\Pages\Index;

use Illuminate\View\Component;

class StatBox extends Component
{
    public function __construct()
    {
        //
    }

    public function render()
    {
        return view('components.dashboard.stat-box');
    }
}
