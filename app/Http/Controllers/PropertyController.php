<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Repositories\PropertyRepository;
use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;

class PropertyController extends Controller
{
    private $repository;

    public function __construct()
    {
        $this->repository = new PropertyRepository;
    }

    public function index()
    {
        return view('dashboard.properties.index', [
            'properties' => $this->repository
                ->orderBy('id', 'desc')->get(),
        ]);
    }

    public function create()
    {
        return view('dashboard.properties.create');
    }

    public function store(StorePropertyRequest $request)
    {
        $this->repository->create($request->all());

        session()->flash('success', "La propriété a été créée.");

        return redirect()->back();
    }

    public function show(Property $property)
    {
        return view('dashboard.properties.show', [
            'property' => $property->load(['propertyValues']),
        ]);
    }

    public function edit(Property $property)
    {
        return view('dashboard.properties.edit', [
            'property' => $property,
        ]);
    }

    public function update(UpdatePropertyRequest $request, Property $property)
    {
        if (
            $this->repository->nameExists($request->name) &&
            ($this->repository->nameRelatedToId($request->name, $property->id) == false)
        ) {
            session()->flash('name_already_provided', "Le nom de la propriété précédemment saisie : " . $request->name . " est déjà utilisée.");
        } else {
            $this->repository->update($request->all(), $property->id);
            session()->flash('success', "La propriété a été modifiée.");
        }

        return redirect()->back();
    }

    public function delete(Property $property)
    {
        return view('dashboard.properties.delete', [
            'property' => $property,
        ]);
    }

    public function destroy(Property $property)
    {
        $this->repository->destroy($property->id);

        session()->flash('success', "La propriété a été supprimée.");

        return redirect()->route('property.index');
    }
}
