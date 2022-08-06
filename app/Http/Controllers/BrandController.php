<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Repositories\BrandRepository;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;

class BrandController extends Controller
{
    private $repository;

    public function __construct()
    {
        $this->repository = new BrandRepository;
    }

    public function index()
    {
        return view('dashboard.brands.index', [
            'brands' => $this->repository
                ->orderBy('id', 'desc')->get(),
        ]);
    }

    public function create()
    {
        return view('dashboard.brands.create');
    }

    public function store(StoreBrandRequest $request)
    {
        $this->repository->create($request->all());

        session()->flash('success', "La marque a été créée.");

        return redirect()->back();
    }

    public function show(Brand $brand)
    {
        return view('dashboard.brands.show', [
            'brand' => $brand,
        ]);
    }

    public function edit(Brand $brand)
    {
        return view('dashboard.brands.edit', [
            'brand' => $brand,
        ]);
    }

    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        if (
            $this->repository->nameExists($request->name) &&
            ($this->repository->nameRelatedToId($request->name, $brand->id) == false)
        ) {
            session()->flash('name_already_provided', "Le nom de la marque précédemment saisie : " . $request->name . " est déjà utilisé.");
        } else {
            $this->repository->update($request->all(), $brand->id);
            session()->flash('success', "La marque a été modifiée.");
        }

        return redirect()->back();
    }

    public function delete(Brand $brand)
    {
        return view('dashboard.brands.delete', [
            'brand' => $brand,
        ]);
    }

    public function destroy(Brand $brand)
    {
        $this->repository->destroy($brand->id);

        session()->flash('success', "La marque a été supprimée.");

        return redirect()->route('brand.index');
    }
}
