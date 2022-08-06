<?php

namespace App\Http\Controllers;

use App\Services\PasswordService;
use App\Http\Requests\UpdatePasswordRequest;

class UpdatePasswordController extends Controller
{
    public function update(UpdatePasswordRequest $request)
    {

        // check if user loged is password owner:
            
        (new PasswordService())
            ->update(
                auth()->user(),
                $request
            );

        return redirect(route('profile.show'));
    }
}
