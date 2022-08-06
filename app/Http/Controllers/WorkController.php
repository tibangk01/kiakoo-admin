<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Repositories\WorkRepository;
use App\Http\Requests\StoreWorkRequest;
use App\Http\Requests\UpdateWorkRequest;

class WorkController extends Controller
{
    private $repository;

    public function __construct()
    {
        $this->repository = new WorkRepository;
    }

    public function index()
    {
        return view('dashboard.works.index', [
            'works' => $this->repository
                ->orderBy('id', 'desc')->get(),
        ]);
    }

    public function create()
    {
        return view('dashboard.works.create');
    }

    public function store(StoreWorkRequest $request)
    {
        $this->repository->create($request->all());

        session()->flash('success', "La fonction a été créée.");

        return redirect()->back();
    }

    public function show(Work $work)
    {
        return view('dashboard.works.show', [
            'work' => $work,
        ]);
    }

    public function edit(Work $work)
    {
        return view('dashboard.works.edit', [
            'work' => $work,
        ]);
    }

    public function update(UpdateWorkRequest $request, Work $work)
    {
        if (
            $this->repository->nameExists($request->name) &&
            ($this->repository->nameRelatedToId($request->name, $work->id) == false)
        ) {
            session()->flash('name_already_provided', "Le nom de la fonction précédemment saisie : " . $request->name . " est déjà utilisé.");
        } else {
            $this->repository->update($request->all(), $work->id);
            session()->flash('success', "La fonction a été modifiée.");
        }

        return redirect()->back();
    }

    public function delete(Work $work)
    {
        return view('dashboard.works.delete', [
            'work' => $work,
        ]);
    }

    public function destroy(Work $work)
    {
        $this->repository->destroy($work->id);

        session()->flash('success', "La fonction a été supprimée.");

        return redirect()->route('work.index');
    }
}
