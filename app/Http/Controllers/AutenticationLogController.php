<?php

namespace App\Http\Controllers;

use App\Repositories\AuthenticationLogRepository;

class AutenticationLogController extends Controller
{
    protected $repository;

    public function __construct()
    {
        $this->middleware(['role:administrateur','permission:gerer_journal_de_connexions']);

        $this->repository = new AuthenticationLogRepository;
    }

    public function index()
    {
        return view('dashboard.authentication-log.index', [
            'authenticationLogs' => $this->repository->withIndexRelation(),
        ]);
    }
}
