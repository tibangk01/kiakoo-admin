<?php

namespace App\Http\Controllers;

use App\Models\TaxonChild;
use App\Repositories\TaxonRepository;
use App\Repositories\TaxonChildRepository;
use App\Http\Requests\StoreTaxonChildRequest;
use App\Http\Requests\UpdateTaxonChildRequest;

class TaxonChildController extends Controller
{
    private $repository;
    private $taxonRepository;

    public function __construct()
    {
        $this->repository = new TaxonChildRepository;
        $this->taxonRepository = new TaxonRepository;
    }

    public function index()
    {
        return view('dashboard.taxon-children.index', [
            'taxonChildren' =>  $this->repository
                ->with('taxon')
                ->orderBy('name', 'desc')
                ->get(),
        ]);
    }

    public function create()
    {
        return view('dashboard.taxon-children.create', [
            'taxons' => $this->taxonRepository->pluck(),
        ]);
    }

    public function store(StoreTaxonChildRequest $request)
    {
        $taxon = $this->taxonRepository->findOrFail($request->taxon_id);

        if ($this->repository->whereTaxonChildNameBelongsToTaxon($request->name, $taxon->id)) {
            $message = "La famille précédemment saisie: ";
            $message .= $request->name;
            $message .= " est déjà enregistrée pour la sous-catégorie: ";
            $message .= $taxon->name;

            session()->flash('name_already_registered', $message);
        } else {
            $this->repository->create($request->all());
            session()->flash('success', "La famille a été créé.");
        }

        return redirect()->back();
    }

    public function show(TaxonChild $taxonChild)
    {
        return view('dashboard.taxon-children.show', [
            'taxonChild' => $taxonChild->load('taxon'),
        ]);
    }

    public function edit(TaxonChild $taxonChild)
    {
        return view('dashboard.taxon-children.edit', [
            'taxonChild' => $taxonChild,
            'taxons' => $this->taxonRepository->pluck(),
        ]);
    }

    public function update(UpdateTaxonChildRequest $request, TaxonChild $taxonChild)
    {
        if (
            $this->repository->whereTaxonChildNameBelongsToTaxon($request->name, $taxonChild->taxon->id) &&
            ($request->name != $taxonChild->name)
        ) {

            $message = "La famille précédemment saisie: ";
            $message .= $request->name;
            $message .= " est déjà enregistrée pour la sous-catégorie: ";
            $message .= $taxonChild->taxon->name;

            session()->flash('name_already_registered', $message);
        } else {
            $this->repository->update($request->all(), $taxonChild->id);
            session()->flash('success', "La famille a été modifié.");
        }

        return redirect()->back();
    }

    public function delete(TaxonChild $taxonChild)
    {
        return view('dashboard.taxon-children.delete', [
            'taxonChild' => $taxonChild->load('taxon'),
        ]);
    }

    public function destroy(TaxonChild $taxonChild)
    {
        $this->repository->destroy($taxonChild->id);

        session()->flash('success', "La famille a été supprimé.");

        return redirect()->route('taxon-child.index');
    }
}
