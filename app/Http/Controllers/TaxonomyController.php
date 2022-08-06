<?php

namespace App\Http\Controllers;

use App\Models\Taxonomy;
use Illuminate\Support\Facades\DB;
use App\Repositories\TaxonomyRepository;
use App\Http\Requests\StoreTaxonomyRequest;
use App\Http\Requests\UpdateTaxonomyRequest;

class TaxonomyController extends Controller
{
    private $repository;

    public function __construct()
    {
        $this->repository = new TaxonomyRepository;
    }

    public function index()
    {
        return view('dashboard.taxonomies.index', [
            'taxonomies' => $this->repository
                ->with('media')
                ->orderBy('id', 'desc')
                ->get(),
        ]);
    }

    public function create()
    {
        return view('dashboard.taxonomies.create');
    }

    public function store(StoreTaxonomyRequest $request)
    {
        DB::beginTransaction();

        try {

            $taxonomy = $this
                ->repository
                ->create($request->only(['name']));

            $taxonomy->addMediaFromRequest('image')
                ->toMediaCollection('taxonomies');

            DB::commit();

            session()->flash(
                'success',
                "La catégorie a été créée."
            );
        } catch (\Throwable $e) {

            DB::rollBack();

            session()->flash(
                'error',
                "Une erreur s'est produite, réessayer plus tard."
            );
        }

        return redirect()->back();
    }

    public function show(Taxonomy $taxonomy)
    {
        return view('dashboard.taxonomies.show', [
            'taxonomy' => $taxonomy->load('media'),
        ]);
    }

    public function edit(Taxonomy $taxonomy)
    {
        return view('dashboard.taxonomies.edit', [
            'taxonomy' => $taxonomy,
        ]);
    }

    public function update(UpdateTaxonomyRequest $request, Taxonomy $taxonomy)
    {
        if ($this->repository->nameExists($request->name)) {

            if ($this->repository->nameRelatedToId($request->name, $taxonomy->id) === false) {
                session()->flash('name_already_provided', "Le nom de la catégorie précédemment saisie : " . $request->name . " est déjà utilisé.");

                return redirect()->back();
            }
        }

        DB::beginTransaction();

        try {

            $this
                ->repository
                ->update($request->only(['name']), $taxonomy->id);

            if($request->hasFile('image')){
                $taxonomy
                    ->addMediaFromRequest('image')
                    ->toMediaCollection('taxonomies');
            }

            DB::commit();

            session()->flash(
                'success',
                "La catégorie a été modifiée."
            );
        } catch (\Throwable $e) {
            DB::rollBack();

            session()->flash(
                'error',
                "Une erreur s'est produite, réessayer plus tard."
            );
        }

        return redirect()->back();
    }

    public function delete(Taxonomy $taxonomy)
    {
        return view('dashboard.taxonomies.delete', [
            'taxonomy' => $taxonomy,
        ]);
    }

    public function destroy(Taxonomy $taxonomy)
    {
        $this->repository->destroy($taxonomy->id);

        session()->flash('success', "La catégorie a été supprimée.");

        return redirect()->route('taxonomy.index');
    }
}
