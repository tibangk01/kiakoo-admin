<?php

namespace App\Services;

use App\Models\Variation;
use Illuminate\Support\Facades\DB;
use App\Repositories\VariationRepository;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class VariationService
{
    public $repository;

    public function __construct()
    {
        $this->repository = new VariationRepository;
    }

    public function create($request)
    {
        DB::beginTransaction();

        try {

            $variation = $this->repository->create($request->all());

            $this->createDefault($variation);

            DB::commit();

            session()->flash('success', "La variation à été bien ajoutée.");

            return $variation;
        } catch (\Throwable $e) {

            DB::rollBack();

            session()->flash('error', "Une erreur s'est produite, réessayer plus tard.");
        }
    }

    public function update($request, $variation)
    {
        $this->repository->update(
            $request->all(),
            $variation->id
        );

        session()->flash('success', "La variation à été bien modifiée.");
    }

    private function createDefault(Variation $variation): Media
    {   //TODO: good default image :
        return $variation
            ->addMedia(base_path('public/defaults/product-default.jpeg'))
            ->preservingOriginal()
            ->toMediaCollection('variations');
    }
}
