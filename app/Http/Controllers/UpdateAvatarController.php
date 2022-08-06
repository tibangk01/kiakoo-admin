<?php

namespace App\Http\Controllers;

use App\Services\AvatarService;
use App\Http\Requests\UpdateAvatarRequest;

class UpdateAvatarController extends Controller
{
    public function update(UpdateAvatarRequest $requsest)
    {
        if ((new AvatarService())->update()) {
            session()->flash('success', 'Photo de profil correctement mise à jour.');
        } else {
            session()->flash('error', "Une erreur s'est produite, réessayer plus tard.");
        }

        return redirect(route('profile.show'));
    }
}
