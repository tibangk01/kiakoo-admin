<?php

namespace App\Services;

use App\Services\AvatarService;
use App\Services\ActivityService;
use Illuminate\Support\Facades\DB;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Repositories\HumanRepository;
use App\Repositories\EmployeeRepository;
use Exception;

class EmployeeService
{
    protected $avatarService;
    protected $activityService;
    protected $userRepository;
    protected $humanRepository;
    protected $passwordService;
    protected $employeeRepository;

    public function __construct()
    {
        $this->avatarService = new AvatarService;
        $this->activityService = new ActivityService;
        $this->userRepository = new UserRepository;
        $this->humanRepository = new HumanRepository;
        $this->passwordService = new PasswordService;
        $this->employeeRepository = new EmployeeRepository;
    }

    public function create($request)
    {
        // dd(
        //     'work_id: '. $request->work_id,
        //     'gender_id: '.$request->gender_id,
        //     'first_name: ' . $request->first_name,
        //     'last_name: ' . $request->last_name,
        //     'address: ' . $request->address,
        //     'phone_number: '. $request->phone_number,
        //     'email: ' . $request->email,
        //     $request->role,
        //     'authorized_to_log_in: ' . $request->authorized_to_log_in,
        //     $request->permission,
        // );

        DB::beginTransaction();

        try {

            // plain text password & hashed passwords:
            $plain_text_password = $this->passwordService->randomAlphaNumeric();
            $hashed_password = Hash::make($plain_text_password);

            // insert user:
            $user = $this->userRepository->create([
                'email' => $request->email,
                'user_type' => config('kiakoo.user_type.employee'),
                'password' => $hashed_password,
            ]);

            // insert human:
            $human = $this->humanRepository->create([
                'gender_id' => $request->gender_id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
            ]);

            // insert employee:
            $employee = $this->employeeRepository->create([
                'user_id' => $user->id,
                'human_id' => $human->id,
                'work_id' => $request->work_id,
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'temporary_password' => $plain_text_password,
                'authorized_to_log_in' => $request->authorized_to_log_in,
            ]);

            // assign user his roles:
            $role = $request->role ? $request->role : [];
            $user->assignRole($role);

            //assign permissions:
            $permission = $request->permission ? $request->permission : [];
            $user->givePermissionTo($permission);

            // log users informations:
            $data = [
                'roles' => $role,
                'permissions' => $permission,
                'authorized_to_log_in' => $request->authorized_to_log_in,
            ];

            $this->activityService->log(
                'Ajout Employé(e)',
                Auth::user(),
                $employee,
                'created',
                $data,
                'created',
            );

            // insert default avatar:
            $this->avatarService->createDefault($user);

            DB::commit();

            session()->flash('success', "L'employé(e) a été bien ajouté(e).");
        } catch (Exception $e) {

            DB::rollBack();

            session()->flash('error', "Une erreur s'est produite, réessayer plus tard.");
        }
    }

    public function update($request, $employee)
    {
        // dd(
        //     'work_id: '. $request->work_id,
        //     'gender_id: '.$request->gender_id,
        //     'first_name: ' . $request->first_name,
        //     'last_name: ' . $request->last_name,
        //     'address: ' . $request->address,
        //     'phone_number: '. $request->phone_number,
        //     'email: ' . $request->email,
        //     $request->role,
        //     'authorized_to_log_in: ' . $request->authorized_to_log_in,
        //     $request->permission,
        // );

        DB::beginTransaction();

        try {

            // get employee old data for log:
            $data = [
                'old attributes' => [
                    'authorized_to_log_in' => $employee->authorized_to_log_in,
                    'roles' => $employee->user->roles->pluck('id'),
                ]
            ];

            //update employee:
            $employee->update([
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'authorized_to_log_in' => $request->authorized_to_log_in,
                'work_id' => $request->work_id,
            ]);

            // update human:
            $employee->human->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'gender_id' => $request->gender_id,
            ]);

            //update email
            $employee->user->update([
                'email' => $request->email,
            ]);

            //syncRoles
            $roles = $request->input('role') ? $request->input('role') : [];
            $employee->user->syncRoles($roles);

            //syncPermissions:
            $permissions = $request->permission ? $request->permission : [];
            $employee->user->syncPermissions($permissions);

            // get employee new data for log:
            $data[] = [
                'new attributes' => [
                    'authorized_to_log_in' => $request->authorized_to_log_in,
                    'roles' => $roles,
                    'permissions' => $permissions,
                ]
            ];

            // call of activity log service:
            $this->activityService->log(
                'Modification Employé(e)',
                Auth::user(),
                $employee,
                'updated',
                $data,
                'updated'
            );

            DB::commit();

            session()->flash('success', "L'employé(e) a été bien modifié(e).");
        } catch (\Throwable $e) {

            DB::rollBack();

            session()->flash('error', "Une erreur s'est produite, réessayer plus tard.");
        }
    }
}
