<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Discount;
use App\Services\DiscountService;
use App\Repositories\DiscountRepository;
use App\Repositories\VariationRepository;
use App\Http\Requests\StoreDiscountRequest;
use App\Http\Requests\UpdateDiscountRequest;

class DiscountController extends Controller
{
    private $service;
    private $repository;
    private $variationRepository;

    public function __construct()
    {
        $this->service = new DiscountService;
        $this->repository = new DiscountRepository;
        $this->variationRepository = new VariationRepository;
    }

    public function index()
    {
        return view('dashboard.discounts.index', [
            'discounts' => $this
                ->repository
                ->with(['discountable'])
                ->orderBy('id', 'desc')
                ->get(),
        ]);
    }

    public function create()
    {
        return view('dashboard.discounts.create', [
            'variations' => $this
                ->variationRepository
                ->pluck(),
        ]);
    }

    public function store(StoreDiscountRequest $request)
    {
        $variation = $this
            ->variationRepository
            ->findOrFail($request->variation_id);

        if ($this->repository->exists($variation->id) === true) {
            session()->flash(
                'discount_already_exists',
                "L'article précédement choisi : " .
                    $variation->name .
                    ", est déjà associé à une réduction. Veillez la modifier au besoin."
            );

            return redirect()->back();
        }

        if ($this->variationRepository->stockEmpty($variation->id)) {
            session()->flash(
                'stock_empty',
                "Le stock le l'article précédement choisi : " .
                    $variation->name . ", est épuisé."
            );

            return redirect()->back();
        }

        if ($request->quantity > $variation->stock) {
            session()->flash(
                'form_quantity_greater_than_variation_one',
                "La quantité saisie précédement : " .
                    $request->quantity .
                    ", est supérieure à la quantité en stock : " .
                    $variation->stock . ", de l'article sélectionné : " .
                    $variation->name . "."
            );

            return redirect()->back();
        }

        $this->service->create($request);

        session()->flash('success', "La réduction a été enregistrée.");

        return redirect()->back();
    }

    public function show(Discount $discount)
    {
        return view('dashboard.discounts.show', [
            'discount' => $discount
                ->load('discountable'),
        ]);
    }

    public function edit(Discount $discount)
    {
        return view('dashboard.discounts.edit', [
            'discount' => $discount
                ->load('discountable'),
            'variations' => $this
                ->variationRepository
                ->pluck(),
        ]);
    }

    public function update(UpdateDiscountRequest $request, Discount $discount)
    {
        if ($discount->discountable->stock === 0) {
            session()->flash(
                'warning',
                "Le stock de cet l'article est épuisé.
                Veillez faire l'opprovisionnement avant
                la réalisation de cette opération."
            );

            return redirect()->back();
        }

        if ($this->service->allowQuantityAddition(
            $discount->quantity,
            $request->quantity,
            $discount->discountable->stock
        ) === false) {
            session()->flash(
                'bad_new_quantity',
                "La quantité additionnelle pour cet
                article doit être inférieure ou égale à " .
                    ($discount->discountable->stock - $discount->quantity)
            );

            return redirect()->back();
        }

        $newQuantity = $discount->quantity + $request->quantity;

        $this->repository->update([
            'amount' => $request->amount,
            'quantity' => $newQuantity,
            'expires_at' => Carbon::parse($request->expires_at . ' 23:59:59'),
            'is_daily_offer' => $request->is_daily_offer,
        ], $discount->id);

        session()->flash('success', 'La réduction a été modifier.');

        return redirect()->back();
    }

    public function delete(Discount $discount)
    {
        return view('dashboard.discounts.delete', [
            'discount' => $discount
                ->load('discountable'),
        ]);
    }

    public function destroy(Discount $discount)
    {
        $this->repository->destroy($discount->id);

        session()->flash('success', "La réduction a été supprimée.");

        return redirect()->route('discount.index');
    }
}
