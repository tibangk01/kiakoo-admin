<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\MediaRepository;
use App\Repositories\VariationRepository;
use App\Http\Requests\StoreVariationImageRequest;

class VariationImageController extends Controller
{
    private $repository;
    private $mediaRepository;

    public function __construct()
    {
        $this->repository = new VariationRepository;
        $this->mediaRepository = new MediaRepository;
    }

    public function show($variationId)
    {
        return view('dashboard.variation-images.show', [
            'variation' => $this->repository->with([
                'media',
            ])->findOrFail($variationId)
        ]);
    }

    public function store(StoreVariationImageRequest $request)
    {
        if (
            $request->filled('variation_id') &&
            $request->hasFile('variation_images')
        ) {
            $variation = $this->repository->findOrFail($request->variation_id);
            $media = $variation->getFirstMedia('variations');

            foreach ($request->variation_images as  $image) {
                $variation->addMedia($image)->toMediaCollection('variations');
            }

            if ($this->repository->pictureChanged($request->variation_id) === false) {

                $media->delete();

                $this->repository->update([
                    'picture_changed' => 1
                ], $request->variation_id);
            }

            session()->flash('success', "Images ajoutée!");

            return redirect()->route('variation-image.show',  $variation->id);
        }

        abort(404);
    }

    public function destroy(Request $request)
    {
        if (
            $request->filled('variation_id') &&
            $request->filled('media_id')
        ) {

            $variation = $this->repository->findOrFail($request->variation_id);

            $medias = $variation->getMedia('variations');
            $media = $medias->where('id', $request->media_id)->firstOrFail();

            if ($this->mediaRepository->countWhereModel($request->variation_id) <= 1) {
                session()->flash('error', "Un produit doit avoir au minimum une (01) image.");
            } else {

                $media->delete();

                session()->flash('success', "L'image a été correctement retirée.");
            }

            return redirect()->route('variation-image.show', $variation->id);
        }

        abort(404);
    }
}
