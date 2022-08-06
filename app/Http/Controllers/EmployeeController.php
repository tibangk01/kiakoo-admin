<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Services\ActivityService;
use App\Services\EmployeeService;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use App\Repositories\WorkRepository;
use Illuminate\Support\Facades\Auth;
use App\Repositories\GenderRepository;
use App\Repositories\EmployeeRepository;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Repositories\PermissionRepository;

class EmployeeController extends Controller
{
    protected $repository;
    protected $workRepository;
    protected $roleRepository;
    protected $userRepository;
    protected $employeeService;
    protected $activityService;
    protected $genderRepository;
    protected $permissionRepository;

    public function __construct()
    {
        $this->middleware(['role:administrateur','permission:gerer_employes']);

        $this->repository = new EmployeeRepository;
        $this->workRepository = new WorkRepository;
        $this->roleRepository = new RoleRepository;
        $this->userRepository = new UserRepository;
        $this->employeeService = new EmployeeService;
        $this->activityService = new ActivityService;
        $this->genderRepository = new GenderRepository;
        $this->permissionRepository = new PermissionRepository;
    }

    public function index()
    {
        return view('dashboard.employees.index', [
            'employees' => $this->repository->withIndexRelations(),
        ]);
    }

    public function create()
    {
        return view('dashboard.employees.create', [
            'genders' => $this->genderRepository->pluck(),
            'works' => $this->workRepository->pluck(),
            'roles' => $this->roleRepository->pluck(),
            'permissions' => $this->permissionRepository->pluck(),
        ]);
    }

    public function store(StoreEmployeeRequest $request)
    {
        if ($this->userRepository->employeeEmailNotUnique($request->email)) {
            session()->flash('email_already_provided', "E-mail déjà attribué à un autre employé.");
        } else {
            // add an employee:
            $this->employeeService->create($request);
        }

        return redirect()->route('employee.create');
    }

    public function show(Employee $employee)
    {
        return view('dashboard.employees.show', [
            'employee' => $this->repository
                ->withShowRelations($employee->id)
        ]);
    }

    public function edit(Employee $employee)
    {
        return view('dashboard.employees.edit', [
            'genders' => $this->genderRepository->pluck(),
            'works' => $this->workRepository->pluck(),
            'roles' => $this->roleRepository->pluck(),
            'permissions' => $this->permissionRepository->pluck(),
            'employee' => $this->repository->withEditRelations($employee->id)
        ]);
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        if (
            $this->userRepository->emailExists($request->email) &&
            ($this->repository->emailOwner($employee->id, $request->email) === false)
        ) {
            session()->flash('email_already_provided', "L'email précédemment saisie : " . $request->email . " est déjà attribuée.");
        } elseif (
            $this->repository->phoneNumberExists($request->phone_number) &&
            ($this->repository->phoneNumberOwner($employee->id, $request->phone_number) === false)
        ) {
            session()->flash('phone_number_already_provided', "Le numéro de téléphone précédemment saisie : " . $request->phone_number . " est déjà attribué.");
        } else {
            // update employee:
            $this->employeeService->update($request, $employee);
        }

        return redirect()->route('employee.edit', $employee);
    }

    public function delete(Employee $employee)
    {
        return view('dashboard.employees.delete', [
            'employee' => $this->repository
                ->withDeleteRelations($employee->id),
        ]);
    }

    public function destroy(Employee $employee)
    {
        // get employee data:
        $data = [
            'attributes' => [
                'employee_id' => $employee->id,
                'address' => $employee->address,
                'email' => $employee->user->email,
                'work_id' => $employee->work_id,
                'gender_id' => $employee->human->gender_id,
                'phone_number' => $employee->phone_number,
                'first_name' => $employee->human->first_name,
                'last_name' => $employee->human->last_name,
                'authorized_to_log_in' => $employee->authorized_to_log_in,
                'roles' => $employee->user->roles->pluck('id'),
            ]
        ];

        // log data before deletion:
        $this->activityService->log(
            'Suppression Employé(e)',
            Auth::user(),
            $employee,
            'deleted',
            $data,
            'deleted',
        );

        $employee->delete();

        session()->flash('success', "L'employé(e) a été correctement supprimé(e).");

        return redirect()->route('employee.index');
    }
}
