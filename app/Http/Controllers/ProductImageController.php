<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\MediaRepository;
use App\Repositories\ProductRepository;
use App\Http\Requests\StoreProductImageRequest;

class ProductImageController extends Controller
{
    private $repository; //Product repo
    private $mediaRepository;

    public function __construct()
    {
        $this->repository = new ProductRepository;
        $this->mediaRepository = new MediaRepository;
    }

    public function index(Request $request)
    {
        if ($request->filled('productId') == false) {
            abort(404);
        }

        return view('dashboard.product-images.index', [
            'product' => $this->repository->with([
                'media',
            ])->findOrFail($request->productId),
        ]);
    }

    public function store(StoreProductImageRequest $request)
    {
        if (
            $request->filled('product_id') &&
            $request->hasFile('product_images')
        ) {

            $product = $this->repository->findOrFail($request->product_id);
            $media = $product->getFirstMedia('products');

            foreach ($request->product_images as  $image) {
                $product->addMedia($image)->toMediaCollection('products');
            }

            if ($this->repository->pictureChanged($request->product_id) == false) {

                $media->delete();

                $this->repository->update([
                    'picture_changed' => 1
                ], $request->product_id);
            }

            session()->flash('success', "Images ajoutée");

            return redirect()->route('product-image.index', ['productId' => $product->id]);
        }

        abort(404);
    }

    public function destroy(Request $request)
    {
        if (
            $request->filled('product_id') &&
            $request->filled('media_id')
        ) {

            $product = $this->repository->findOrFail($request->product_id);

            $medias = $product->getMedia('products');
            $media = $medias->where('id', $request->media_id)->firstOrFail();

            if ($this->mediaRepository->countWhereModel($request->product_id) <= 1) {
                session()->flash('error', "Un produit doit avoir au minimum une (01) image.");
            } else {

                $media->delete();

                session()->flash('success', "L'image a été correctement retirée.");
            }

            return redirect()->route('product-image.index', ['productId' => $product->id]);
        }

        abort(404);
    }
}
