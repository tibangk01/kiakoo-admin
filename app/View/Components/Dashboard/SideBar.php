<?php

namespace App\View\Components\Dashboard;

use Illuminate\View\Component;

class SideBar extends Component
{
    public function __construct()
    {
        //
    }

    public function render()
    {
        return view('components.dashboard.side-bar');
    }
}
