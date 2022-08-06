<?php

namespace App\Http\Controllers;

use App\Models\PropertyValue;
use App\Repositories\PropertyRepository;
use App\Repositories\PropertyValueRepository;
use App\Http\Requests\StorePropertyValueRequest;
use App\Http\Requests\UpdatePropertyValueRequest;

class PropertyValueController extends Controller
{
    private $repository;
    private $propertyRepository;

    public function __construct()
    {
        $this->repository = new PropertyValueRepository;
        $this->propertyRepository = new PropertyRepository;
    }

    public function index()
    {
        return view('dashboard.property-values.index', [
            'propertyValues' =>  $this
                ->repository
                ->with('property')
                ->orderBy('id', 'desc')
                ->get(),
        ]);
    }

    public function create()
    {
        return view('dashboard.property-values.create', [
            'properties' => $this
                ->propertyRepository
                ->pluck(),
        ]);
    }

    public function store(StorePropertyValueRequest $request)
    {
        $property = $this->propertyRepository->findOrFail($request->property_id);

        if ($this->repository->wherePropertyValueNameBelongsToProperty($request->name, $property->id)) {
            $message = "La valeur de propriété précédemment saisie: ";
            $message .= $request->name;
            $message .= " est déjà enregistrée pour la propriété: ";
            $message .= $property->name;

            session()->flash('name_already_registered', $message);
        } else {
            $this->repository->create($request->all());
            session()->flash('success', "La valeur de la propriété a été créé.");
        }

        return redirect()->back();
    }

    public function show(PropertyValue $propertyValue)
    {
        return view('dashboard.property-values.show', [
            'propertyValue' => $propertyValue->load('property'),
        ]);
    }

    public function edit(PropertyValue $propertyValue)
    {
        return view('dashboard.property-values.edit', [
            'propertyValue' => $propertyValue,
            'properties' => $this->propertyRepository->pluck(),
        ]);
    }

    public function update(UpdatePropertyValueRequest $request, PropertyValue $propertyValue)
    {
        if (
            $this->repository->wherePropertyValueNameBelongsToProperty($request->name, $propertyValue->property->id) &&
            ($request->name != $propertyValue->name)
        ) {
            $message = "La valeur de propriété précédemment saisie: ";
            $message .= $request->name;
            $message .= " est déjà enregistrée pour la propriété: ";
            $message .= $propertyValue->property->name;

            session()->flash('name_already_registered', $message);
        } else {

            $this->repository->update($request->all(), $propertyValue->id);
            session()->flash('success', "La valeur de la propriété a été modifié.");
        }

        return redirect()->back();
    }

    public function delete(PropertyValue $propertyValue)
    {
        return view('dashboard.property-values.delete', [
            'propertyValue' => $propertyValue->load('property'),
        ]);
    }

    public function destroy(PropertyValue $propertyValue)
    {
        $this->repository->destroy($propertyValue->id);

        session()->flash('success', "La valeur de la propriété a été supprimé.");

        return redirect()->route('property-value.index');
    }
}
