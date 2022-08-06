<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Repositories\StateRepository;
use App\Http\Requests\StoreStateRequest;
use App\Http\Requests\UpdateStateRequest;

class StateController extends Controller
{
    private $repository;

    public function __construct()
    {
        $this->repository = new StateRepository;
    }

    public function index()
    {
        return view('dashboard.states.index', [
            'states' => $this->repository
                ->orderBy('id', 'desc')->get(),
        ]);
    }

    public function create()
    {
        return view('dashboard.states.create');
    }

    public function store(StoreStateRequest $request)
    {
        $this->repository->create($request->all());

        session()->flash('success', "Le conditionnement a été créée.");

        return redirect()->back();
    }

    public function show(State $state)
    {
        return view('dashboard.states.show', [
            'state' => $state,
        ]);
    }

    public function edit(State $state)
    {
        return view('dashboard.states.edit', [
            'state' => $state,
        ]);
    }

    public function update(UpdateStateRequest $request, State $state)
    {
        if (
            $this->repository->nameExists($request->name) &&
            ($this->repository->nameRelatedToId($request->name, $state->id) == false)
        ){
            session()->flash('name_already_provided', "Le nom du conditionnement précédemment saisie : " . $request->name . " est déjà utilisé.");
        }else{
            $this->repository->update($request->all(), $state->id);
            session()->flash('success', "Le conditionnement a été modifiée.");
        }

        return redirect()->back();
    }

    public function delete(State $state)
    {
        return view('dashboard.states.delete', [
            'state' => $state,
        ]);
    }

    public function destroy(State $state)
    {
        $this->repository->destroy($state->id);

        session()->flash('success', "Le conditionnement a été supprimée.");

        return redirect()->route('state.index');
    }
}
