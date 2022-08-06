<?php

namespace App\Services;

use App\Models\Product;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ProductImageService
{
    public function createDefault(Product $product): Media
    {
        return $product
        ->addMedia(base_path('public/defaults/product.png'))
        ->preservingOriginal()
            ->toMediaCollection('products');
    }
}
