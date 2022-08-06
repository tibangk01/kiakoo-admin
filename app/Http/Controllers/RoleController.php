<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Repositories\RoleRepository;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Repositories\PermissionRepository;

class RoleController extends Controller
{
    protected $repository;
    protected $permissionRepository;

    public function __construct()
    {
        $this->middleware(['role:administrateur','permission:gerer_roles']);

        $this->repository = new RoleRepository;
        $this->permissionRepository = new PermissionRepository;
    }

    public function index()
    {
        return view('dashboard.roles.index', [
            'roles' =>  $this->repository->orderDesc(),
        ]);
    }

    public function create()
    {
        return view('dashboard.roles.create', [
            'permissions' => $this->permissionRepository->pluck(),
        ]);
    }

    public function store(StoreRoleRequest $request)
    {
        $role = $this->repository->create($request->except('permission'));
        $permissions = $request->input('permission') ? $request->input('permission') : [];
        $role->givePermissionTo($permissions);

        session()->flash('success', "Le rôle a été créé.");

        return redirect()->back();
    }

    public function show(Role $role)
    {
        return view('dashboard.roles.show', [
            'role' => $role->load('permissions'),
        ]);
    }

    public function edit(Role $role)
    {
        return view('dashboard.roles.edit', [
            'role' => $role->load('permissions'),
            'permissions' => $this->permissionRepository->pluck(),
        ]);
    }

    public function update(UpdateRoleRequest $request, Role $role)
    {
        if (
            $this->repository->nameExists($request->name) &&
            ($this->repository->nameRelatedToId($request->name, $role->id) == false)
        ) {
            session()->flash('name_already_provided', "Le nom du role précédemment saisie : " . $request->name . " est déjà utilisé.");
        }else{

            $role->update($request->except('permission'));
            $permissions = $request->input('permission') ? $request->input('permission') : [];
            $role->syncPermissions($permissions);

            session()->flash('success', "Le rôle a été modifié.");
        }

        return redirect()->back();
    }

    public function delete(Role $role)
    {
        return view('dashboard.roles.delete', [
            'role' => $role->load('permissions'),
        ]);
    }

    public function destroy(Role $role)
    {
        $role->delete();

        session()->flash('success', "Le rôle a été supprimé.");

        return redirect()->route('role.index');
    }
}
