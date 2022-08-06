<?php

namespace App\View\Components\Dashboard\Pages\Index;

use Illuminate\View\Component;
use App\Repositories\UserRepository;

class Verify extends Component
{
    public $verify;

    public function __construct()
    {
        $this->verify = (new UserRepository())->verifiedAt(auth()->user()->id);
    }
    
    public function render()
    {
        return view('components.dashboard.verify');
    }
}
