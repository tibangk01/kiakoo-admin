<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
use App\Repositories\PropertyValueRepository;
use App\Http\Requests\StoreProductSpecRequest;

class ProductSpecController extends Controller
{
    private $repository;
    private $propertyValueRepository;

    public function __construct()
    {
        $this->repository = new ProductRepository;
        $this->propertyValueRepository = new PropertyValueRepository;
    }

    public function index(Request $request)
    {
        if($request->filled('productId') == false)
        {
            abort(404);
        }

        return view('dashboard.product-specs.index', [
            'product' => $this->repository
                ->with(['propertyValues.property'])
                ->findOrFail($request->productId),
            'propertyValues' => $this
                ->propertyValueRepository
                ->with(['property'])
                ->get(),
        ]);
    }

    public function store(StoreProductSpecRequest $request)
    {
        $product =  $this->repository->findOrFail($request->product_id);

        try {
            $product->propertyValues()->attach($request->propertyValue);
            session()->flash('success', "La caractéristique a été bien ajoutées");
        } catch (\Throwable $e) {
            session()->flash('error', "Une ou plusieurs caractéristiques sont déjà ajoutées.");
        }

        return redirect()->route('product-spec.index', ['productId' => $product->id]);
    }

    public function destroy(Request $request)
    {
        if (
            $request->filled('product_id') &&
            $request->filled('property_value_id')
        ) {
            $product = $this->repository->findOrFail($request->product_id);

            $product->propertyValues()->detach($request->property_value_id);

            session()->flash('success', "La valeur de propriété a été correctement retirée.");

            return redirect()->route('product-spec.index', ['productId' => $product->id]);
        }

        abort(404);
    }
}
