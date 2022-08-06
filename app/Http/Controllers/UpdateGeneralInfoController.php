<?php

namespace App\Http\Controllers;

use App\Services\GeneralInfoService;
use App\Http\Requests\UpdateGeneralInfoRequest;

class UpdateGeneralInfoController extends Controller
{
    public function update(UpdateGeneralInfoRequest $request)
    {
        (new GeneralInfoService())->update(
            auth()->user()->id,
            $request
        );

        return redirect(route('profile.show'));
    }
}
