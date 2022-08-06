<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\ProductService;
use App\Repositories\BrandRepository;
use App\Repositories\StateRepository;
use App\Repositories\ProductRepository;
use App\Repositories\PropertyRepository;
use App\Http\Requests\StoreProductRequest;
use App\Repositories\TaxonChildRepository;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    private $repository;
    private $propertyRepository;
    private $productService;
    private $taxonChildRepository;
    private $brandRepository;

    public function __construct()
    {
        $this->repository = new ProductRepository;
        $this->stateRepository = new StateRepository;
        $this->brandRepository = new BrandRepository;
        $this->propertyRepository = new PropertyRepository;
        $this->productService = new ProductService;
        $this->taxonChildRepository = new TaxonChildRepository;
    }

    public function index()
    {
        return view('dashboard.products.index', [
            'products' =>  $this->repository
                ->with(['brand', 'taxonChild'])
                ->orderBy('id', 'desc')
                ->get(),
        ]);
    }

    public function create()
    {
        return view('dashboard.products.create', [
            'taxonChildren' => $this->taxonChildRepository->pluck(),
            'brands' => $this->brandRepository->pluck(),
            'properties' => $this->propertyRepository->pluck(),
        ]);
    }

    public function store(StoreProductRequest $request)
    {
        // dd(
        //     'brand_id: ' . $request->brand_id,
        //     'taxon_child_id: ' . $request->taxon_child_id,
        //     'name: ' . $request->name ,
        //     $request->properties,
        // );

        $product = $this->productService->create($request);

        session()->flash('success', "Le produit a été ajouté.");

        return redirect()->route('product.show', $product->load(['taxonChild.taxon.taxonomy', 'properties']));
    }

    public function show(Product $product)
    {
        return view('dashboard.products.show', [
            'product' => $product->load(['taxonChild.taxon.taxonomy', 'properties']),
        ]);
    }

    public function edit(Product $product)
    {
        return view('dashboard.products.edit', [
            'product' => $product
                ->load([
                    'brand',
                    'taxonChild',
                    'properties'
                ]),
            'taxonChildren' => $this
                ->taxonChildRepository
                ->pluck(),
            'brands' => $this
                ->brandRepository
                ->pluck(),
            'properties' => $this
                ->propertyRepository
                ->pluck(),
        ]);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        if ($this->repository->nameRelatedToId($request->name, $product->id) === false) {

            if ($this->repository->nameExists($request->name)) {
                session()->flash('name_already_provided', "Le nom de produit précédemment saisie : " . $request->name . " est déjà utilisé.");
                return redirect()->route('product.edit', $product);
            }

        }

        $this->productService->update($request->all(), $product);

        return redirect()->route('product.edit', $product);
    }

    public function delete(Product $product)
    {
        return view('dashboard.products.delete', [
            'product' => $product
                ->load([
                    'taxonChild',
                    'brand',
                    'properties'
                ]),
        ]);
    }

    public function destroy(Product $product)
    {
        $this->repository->destroy($product->id);

        session()->flash('success', "Le produit a été supprimé.");

        return redirect()->route('product.index');
    }
}
