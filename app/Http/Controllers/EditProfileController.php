<?php

namespace App\Http\Controllers;

class EditProfileController extends Controller
{
    public function index()
    {
        return view('dashboard.profile.edit-profile');
    }
}
