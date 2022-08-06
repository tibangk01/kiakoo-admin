<?php

namespace App\View\Components\Dashboard\Pages\Profile;

use Illuminate\View\Component;
use App\Repositories\GeneralInfoRepository;

class UpdateGeneralInformations extends Component
{
    public $user;

    public function __construct()
    {
        $this->user = (new GeneralInfoRepository)->get(auth()->user()->id);
    }

    public function render()
    {
        return view('components.dashboard.profile.update-general-informations');
    }
}
