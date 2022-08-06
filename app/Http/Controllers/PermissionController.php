<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Repositories\PermissionRepository;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;

class PermissionController extends Controller
{
    private $repository;

    public function __construct()
    {
        $this->middleware(['role:administrateur','permission:gerer_permissions']);
        $this->repository = new PermissionRepository;
    }

    public function index()
    {
        return view('dashboard.permissions.index', [
            'permissions' => Permission::orderByDesc('created_at')->get(),
        ]);
    }

    public function create()
    {
        return view('dashboard.permissions.create');
    }

    public function store(StorePermissionRequest $request)
    {
        Permission::create($request->all());

        session()->flash('success', "L'autorisation a été créée.");

        return redirect()->back();
    }

    public function show(Permission $permission)
    {
        return view('dashboard.permissions.show', [
            'permission' => $permission,
        ]);
    }

    public function edit(Permission $permission)
    {
        return view('dashboard.permissions.edit', [
            'permission' => $permission
        ]);
    }

    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        if (
            $this->repository->nameExists($request->name) &&
            ($this->repository->nameRelatedToId($request->name, $permission->id) == false)
        ) {
            session()->flash('name_already_provided', "Le nom de l'autorisation précédemment saisie : " . $request->name . " est déjà utilisé.");
        }else{
            $permission->update($request->all());
            session()->flash('success', "L'autorisation a été modifiée.");
        }

        return redirect()->back();
    }

    public function delete(Permission $permission)
    {
        return view('dashboard.permissions.delete', [
            'permission' => $permission
        ]);
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();

        session()->flash('success', "L'autorisation a été supprimée.");

        return redirect()->route('permission.index');
    }
}
