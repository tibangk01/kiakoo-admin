<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Repositories\ProductRepository;

class ProductService
{
    public $repository;

    public function __construct()
    {
        $this->repository = new ProductRepository;
    }

    public function create($request)
    {
        DB::beginTransaction();

        try {

            $product = $this->repository->create([
                'taxon_child_id' => $request['taxon_child_id'],
                'brand_id' => $request['brand_id'],
                'name' => $request['name'],
            ]);

            $product->properties()->sync($request['properties']);

            DB::commit();

            return $product;

        } catch (\Throwable $e) {

            DB::rollBack();

            session()->flash('error', "Une erreur s'est produite, réessayer plus tard.");
        }
    }

    public function update($request, $product)
    {
        DB::beginTransaction();

        try {

            $this->repository->update([
                'taxon_child_id' => $request['taxon_child_id'],
                'brand_id' => $request['brand_id'],
                'name' => $request['name'],
            ], $product->id);

            $product->properties()->sync($request['properties']);

            //TODO: sync variants when product property is update

            session()->flash('success', "Le produit à été bien modifié.");

            DB::commit();
        } catch (\Throwable $e) {

            DB::rollBack();

            session()->flash('error', "Une erreur s'est produite, réessayer plus tard.");
        }

    }
}
