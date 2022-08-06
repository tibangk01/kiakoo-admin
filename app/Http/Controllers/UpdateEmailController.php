<?php

namespace App\Http\Controllers;

use App\Services\EmailService;
use App\Http\Requests\UpdateEmailRequest;

class UpdateEmailController extends Controller
{
    public function update(UpdateEmailRequest $request)
    {
        (new EmailService())
            ->update(
                auth()->user(),
                $request
            );

        return redirect(route('profile.show'));
    }
}
