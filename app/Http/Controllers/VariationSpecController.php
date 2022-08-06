<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\VariationRepository;
use App\Repositories\PropertyValueRepository;
use App\Http\Requests\StoreVariationSpecRequest;
use App\Repositories\PropertyRepository;

class VariationSpecController extends Controller
{
    private $repository;
    private $propertyValueRepository;

    public function __construct()
    {
        $this->repository = new VariationRepository;
        $this->propertyRepository = new PropertyRepository;
        $this->propertyValueRepository = new PropertyValueRepository;
    }

    public function show($variationId)
    {
        return view('dashboard.variation-specs.show', [
            'variation' => $this->repository->with([
                'propertyValues.property',
                'product.properties.propertyValues',
            ])->findOrFail($variationId)
        ]);
    }

    public function store(StoreVariationSpecRequest $request)
    {
        //TODO: refactor this to more simplier with propertie value duplicattion check

        $variation =  $this->repository->findOrFail($request->variation_id);

        $values = collect($request->propertyValue);

        $formIds = $values->map(function ($value) {

            $propertyValue = $this->propertyValueRepository
                ->with(['property'])
                ->where('id', $value)
                ->first();

            return [
                $propertyValue->id,
                $propertyValue->property->id
            ];
        })->toArray();

        try {
            foreach ($formIds as $form) {
                $variation->propertyValues()->attach([$form[0]], ['property_id' => $form[1]]);
            }
            session()->flash('success', "Les valeurs de propriétés ont été bien ajoutées.");
        } catch (\Throwable $e) {

            session()->flash('error', "Le(s) élément(s) précédement sélectionné(s) sont déjà enregistré(s).");
        }

        return redirect()->route('variation-spec.show', $variation->id);
    }

    public function destroy(Request $request)
    {
        if (
            $request->filled('variation_id') &&
            $request->filled('property_value_id')
        ) {
            $variation = $this->repository->findOrFail($request->variation_id);

            $variation->propertyValues()->detach($request->property_value_id);

            session()->flash('success', "La valeur de propriété a été correctement retirée.");

            return redirect()->route('variation-spec.show', $variation->id);
        }

        abort(404);
    }
}
