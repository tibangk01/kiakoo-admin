<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Promocode;
use App\Repositories\PromocodeRepository;
use App\Http\Requests\StorePromocodeRequest;
use App\Http\Requests\UpdatePromocodeRequest;

class PromocodeController extends Controller
{
    const CONCATENAINED_TIME = ' 23:59:59';

    private $repository;

    public function __construct()
    {

        $this->repository = new PromocodeRepository;
    }

    public function index()
    {
        //TODO: clear this ...
        // $user = Auth::user();

        // $m = $user->redeemCode('VENTE-FLASH');

        // dd($m);

        //TODO: delete user images when he his deleted

        return view('dashboard.promocodes.index', [
            'promocodes' => $this
                ->repository
                ->orderBy('expires_at', 'desc')
                ->get(),
        ]);
    }

    public function create()
    {
        return view('dashboard.promocodes.create');
    }

    public function store(StorePromocodeRequest $request)
    {
        $promocode = $this->repository->create($request->all());

        if ($promocode) {
            $this->repository->update([
                'data' => [
                    'description' => $request->description,
                    'initial_quantity' => $request->quantity,
                    'created_at' => date('Y-m-d H:i:s'),
                ],
                'expires_at' => Carbon::parse($request->expires_at . self::CONCATENAINED_TIME),
            ], $promocode->id);

            session()->flash('success', "Le code promotionnel a été créé.");
        } else {
            session()->flash('error', "Erreur interne, veillez réessayer plus tard");
        }

        return redirect()->back();
    }

    public function show(Promocode $promocode)
    {
        return view('dashboard.promocodes.show', [
            'promocode' => $promocode->load('users'), //TODO: load cutomer informations here to populate the tab
        ]);
    }

    public function edit(Promocode $promocode)
    {
        return view('dashboard.promocodes.edit', [
            'promocode' => $promocode,
        ]);
    }

    public function update(UpdatePromocodeRequest $request, Promocode $promocode)
    {
        if ($this->repository->codeRelatedToId($request->code, $promocode->id) === false) {

            if ($this->repository->codeExists($request->code)) {
                session()->flash('valid_promocode_provided', "Un code promotionnel dénommé: " . $request->code . " existe déjà.");
                return redirect()->back();
            }
        }

        $data = json_decode($promocode->data, true);

        $promocode->update([
            'code' => $request->code,
            'quantity' => ($promocode->quantity + $request->quantity),
            'reward' => $request->reward,
            'data' => [
                'description' => $request->description,
                'initial_quantity' => ($data['initial_quantity'] + $request->quantity),
                'created_at' => $data['created_at'],
            ],
            'expires_at' => Carbon::parse($request->expires_at . self::CONCATENAINED_TIME),
        ]);

        session()->flash('success', "Le code promotionnel a été modifié.");

        return redirect()->back();
    }

    public function delete(Promocode $promocode)
    {
        return view('dashboard.promocodes.delete', [
            'promocode' => $promocode,
        ]);
    }

    public function destroy(Promocode $promocode)
    {
        $this->repository->destroy($promocode->id);

        session()->flash('success', "Le code promotionnel a été supprimé.");

        return redirect()->route('promocode.index');
    }
}
