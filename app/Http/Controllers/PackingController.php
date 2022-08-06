<?php

namespace App\Http\Controllers;

use App\Models\Packing;
use App\Repositories\PackingRepository;
use App\Http\Requests\StorePackingRequest;
use App\Http\Requests\UpdatePackingRequest;

class PackingController extends Controller
{
    private $repository;

    public function __construct()
    {
        $this->repository = new PackingRepository;
    }

    public function index()
    {
        return view('dashboard.packings.index', [
            'packings' => $this->repository
                ->orderBy('id', 'desc')->get(),
        ]);
    }

    public function create()
    {
        return view('dashboard.packings.create');
    }

    public function store(StorePackingRequest $request)
    {
        $this->repository->create($request->all());

        session()->flash('success', "Le conditionnement a été créée.");

        return redirect()->back();
    }

    public function show(Packing $packing)
    {
        return view('dashboard.packings.show', [
            'packing' => $packing,
        ]);
    }

    public function edit(Packing $packing)
    {
        return view('dashboard.packings.edit', [
            'packing' => $packing,
        ]);
    }

    public function update(UpdatePackingRequest $request, Packing $packing)
    {
        if ($this->repository->nameExists($request->name)) {
            if ($this->repository->nameRelatedToId($request->name, $packing->id) == false) {
                session()->flash(
                    'name_already_provided',
                    "Le nom de la marque précédemment saisie : " .
                        $request->name . " est déjà utilisé."
                );

                return redirect()->back();
            }
        }

        $this->repository->update($request->all(), $packing->id);

        session()->flash('success', "La marque a été modifiée.");

        return redirect()->back();
    }

    public function delete(Packing $packing)
    {
        return view('dashboard.packings.delete', [
            'packing' => $packing,
        ]);
    }

    public function destroy(Packing $packing)
    {
        $this->repository->destroy($packing->id);

        session()->flash('success', "La marque a été supprimée.");

        return redirect()->route('packing.index');
    }
}
