<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;

class HomeController extends Controller
{
    public function index()
    {
        // dd(auth()->user());

       return view('index', [
           'verified' => (new UserRepository())->verifiedAt(auth()->user()->id),
        ]);
    }
}
