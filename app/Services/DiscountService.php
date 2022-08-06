<?php

namespace App\Services;

use Carbon\Carbon;
use App\Repositories\DiscountRepository;

class DiscountService
{
    public $repository;

    public function __construct()
    {
        $this->repository = new DiscountRepository;
    }

    public function create($request)
    {
        $this->repository->create([
            'discountable_id' => $request->variation_id,
            'discountable_type' => "App\Models\Variation",
            'quantity' => $request->quantity,
            'amount' => $request->amount,
            'expires_at' => Carbon::parse($request->expires_at . ' 23:59:59'),
            'is_daily_offer' => $request->is_daily_offer,
        ]);
    }

    public function allowQuantityAddition($oldQuantity, $newQuantity, $stock)
    {
        return ($newQuantity + $oldQuantity) <= $stock ? true : false;
    }
}
