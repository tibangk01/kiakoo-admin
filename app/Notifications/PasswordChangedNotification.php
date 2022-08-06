<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PasswordChangedNotification extends Notification
{
    use Queueable;

    public function __construct()
    {
        //
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        //TODO: redefinir un message superbe pour le notifier le changement de mot de passe.

        return (new MailMessage)
            ->greeting('Bonjour!')
            ->subject('Notification de modification de mot de passe')
            ->line('Mot de passe changé ce .... : ' . now());
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
