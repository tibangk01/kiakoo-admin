<?php

namespace App\Http\Controllers;

use App\Models\Variation;
use App\Services\VariationService;
use App\Repositories\StateRepository;
use App\Repositories\PackingRepository;
use App\Repositories\ProductRepository;
use App\Repositories\VariationRepository;
use App\Http\Requests\StoreVariationRequest;
use App\Http\Requests\UpdateVariationRequest;

class VariationController extends Controller
{
    public $service;
    public $repository;
    public $stateRepository;
    public $productRepository;
    public $packingRepository;

    public function __construct()
    {
        $this->service = new VariationService;
        $this->repository = new VariationRepository;
        $this->stateRepository = new StateRepository;
        $this->productRepository = new ProductRepository;
        $this->packingRepository = new PackingRepository;
    }

    public function index()
    {
        return view('dashboard.variations.index', [
            'variations' => $this
                ->repository
                ->with(['discount'])
                ->get(),
        ]);
    }

    public function create()
    {
        return view('dashboard.variations.create', [
            'states' => $this->stateRepository->pluck(),
            'products' => $this->productRepository->pluck(),
            'packings' => $this->packingRepository->pluck(),
        ]);
    }

    public function store(StoreVariationRequest $request)
    {
        $variation = $this->service->create($request);

        return redirect()->route('variation.show', $variation->load([
            'media', 'state', 'packing', 'product'
        ]));
    }

    public function show(Variation $variation)
    {
        return view('dashboard.variations.show', [
            'variation' => $variation->load([
                'media',
                'state',
                'packing',
                'product',
                'propertyValues.property',
                'discount'
            ])
        ]);
    }

    public function edit(Variation $variation)
    {
        return view('dashboard.variations.edit', [
            'variation' => $variation->load([
                'state', 'product', 'packing'
            ]),
            'states' => $this->stateRepository->pluck(),
            'products' => $this->productRepository->pluck(),
            'packings' => $this->packingRepository->pluck(),
        ]);
    }

    public function update(UpdateVariationRequest $request, Variation $variation)
    {
        if ($this->repository->nameRelatedToId($request->name, $variation->id) === false) {
            if ($this->repository->nameExists($request->name)) {
                session()->flash('name_already_registered', "La dénomination de la variation précédemment saisie : " . $request->name . " est déjà utilisé.");

                return redirect()->back();
            }
        }

        if ($this->repository->skuRelatedToId($request->sku, $variation->id) === false) {
            if ($this->repository->skuExists($request->sku)) {
                session()->flash('sku_already_registered', "Le numéro de série de la variation précédemment saisie : " . $request->sku . " est déjà utilisé.");

                return redirect()->back();
            }
        }

        $this->service->update($request, $variation);

        return redirect()->route('variation.show', $variation->load([
            'media', 'state', 'packing', 'product'
        ]));
    }

    public function delete(Variation $variation)
    {
        return view('dashboard.variations.delete', [
            'variation' => $variation->load([
                'media', 'state', 'packing', 'product'
            ]),
        ]);
    }

    public function destroy(Variation $variation)
    {
        $variation->delete();

        session()->flash('success', "La variation a été supprimée.");

        return redirect()->route('variation.index');
    }
}
