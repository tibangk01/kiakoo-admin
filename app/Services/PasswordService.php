<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\PasswordRepository;
use App\Http\Requests\UpdatePasswordRequest;

class PasswordService
{
    private $passwordRepository;

    private $alphas = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    private $numerics = '1234567890@#$*%';

    public function __construct()
    {
        $this->passwordRepository = new PasswordRepository;
    }

    public function update(User $user, UpdatePasswordRequest $request)
    {
        if (!$this->passwordRepository->isValid($user->id, $request->old_password)) {
            session()->flash('password_update_error', 'Erreur ancien mot de passe.');
        } else {

            if (!$this->passwordRepository->update($user->id, $request->new_password)) {
                session()->flash('password_update_error', 'Erreur, réessayer plus tard.');
            } else {
                (new EmailService())->passwordChanged($user);
                session()->flash('password_update_success', 'Votre mot de passe a été correctement mis à jour.');
            }
        }
    }

    public function randomAlphaNumeric($length = 8)
    {
        return substr(str_shuffle($this->alphas . '' . $this->numerics), 0, $length);
    }
}
