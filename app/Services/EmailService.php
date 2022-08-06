<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\EmailRepository;
use App\Repositories\PasswordRepository;
use App\Http\Requests\UpdateEmailRequest;
use Illuminate\Support\Facades\Notification;
use App\Notifications\EmailChangedNotification;
use App\Notifications\PasswordChangedNotification;

class EmailService
{
    protected $emailRepository;
    protected $passwordRepository;

    public function __construct()
    {
        $this->emailRepository = new EmailRepository;
        $this->passwordRepository = new PasswordRepository;
    }

    public function update(User $user, UpdateEmailRequest $request): void
    {
        if (!$this->emailRepository->isValid($user->id, $request->old_email)) {
            session()->flash('email_update_error', 'Ancienne adresse mail non valide.');
        } elseif (!$this->passwordRepository->isValid($user->id, $request->password)) {
            session()->flash('email_update_error', 'Mot de passe non valide.');
        } elseif (!$this->emailRepository->update($user->id, $request->new_email)) {
            session()->flash('email_update_error', 'Erreur, réessayer plus tard.');
        } else {
            session()->flash('email_update_success', "Votre adresse mail a été bien modifiée. Merci de bien vouloir l'activer dans votre nouvelle boîte de réception.");
            Notification::send($user, new EmailChangedNotification());
        }
    }

    public function passwordChanged(User $user): void
    {
        Notification::send($user, new PasswordChangedNotification());
    }
}
