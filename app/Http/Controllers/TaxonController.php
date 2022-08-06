<?php

namespace App\Http\Controllers;

use App\Models\Taxon;
use App\Repositories\TaxonomyRepository;
use App\Repositories\TaxonRepository;
use App\Http\Requests\StoreTaxonRequest;
use App\Http\Requests\UpdateTaxonRequest;

class TaxonController extends Controller
{
    private $repository;
    private $taxonomyRepository;

    public function __construct()
    {
        $this->repository = new TaxonRepository;
        $this->taxonomyRepository = new TaxonomyRepository;
    }

    public function index()
    {
        return view('dashboard.taxons.index', [
            'taxons' =>  $this
                ->repository
                ->with('taxonomy')
                ->orderBy('id', 'desc')
                ->get(),
        ]);
    }

    public function create()
    {
        return view('dashboard.taxons.create', [
            'taxonomies' => $this->taxonomyRepository->pluck(),
        ]);
    }

    public function store(StoreTaxonRequest $request)
    {
        $taxonomy = $this->taxonomyRepository->findOrFail($request->taxonomy_id);

        if ($this->repository->whereTaxonNameBelongsToTaxonomy($request->name, $taxonomy->id)) {
            $message = "La sous-catégorie précédemment saisie: ";
            $message .= $request->name;
            $message .= " est déjà enregistrée pour la catégorie: ";
            $message .= $taxonomy->name;

            session()->flash('name_already_registered', $message);
        } else {
            $this->repository->create($request->all());
            session()->flash('success', "La sous-catégorie a été créé.");
        }

        return redirect()->back();
    }

    public function show(Taxon $taxon)
    {
        return view('dashboard.taxons.show', [
            'taxon' => $taxon->load('taxonomy'),
        ]);
    }

    public function edit(Taxon $taxon)
    {
        return view('dashboard.taxons.edit', [
            'taxon' => $taxon,
            'taxonomies' => $this->taxonomyRepository->pluck(),
        ]);
    }

    public function update(UpdateTaxonRequest $request, Taxon $taxon)
    {
        if (
            $this->repository->whereTaxonNameBelongsToTaxonomy($request->name, $taxon->taxonomy_id) &&
            ($request->name != $taxon->name)
        ) {
            $message = "La sous-catégorie précédemment saisie: ";
            $message .= $request->name;
            $message .= " est déjà enregistrée pour la catégorie: ";
            $message .= $taxon->taxonomy->name;

            session()->flash('name_already_registered', $message);
        } else {
            $this->repository->update($request->all(), $taxon->id);
            session()->flash('success', "La sous-catégorie a été modifié.");
        }

        return redirect()->back();
    }

    public function delete(Taxon $taxon)
    {
        return view('dashboard.taxons.delete', [
            'taxon' => $taxon->load('taxonomy'),
        ]);
    }

    public function destroy(Taxon $taxon)
    {
        $this->repository->destroy($taxon->id);

        session()->flash('success', "La sous-catégorie a été supprimé.");

        return redirect()->route('taxon.index');
    }
}
